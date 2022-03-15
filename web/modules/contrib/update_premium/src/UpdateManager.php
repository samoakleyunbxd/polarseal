<?php

namespace Drupal\update_premium;

use Drupal\Core\DependencyInjection\DependencySerializationTrait;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Cache\Cache;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Extension\ThemeHandlerInterface;
use Drupal\Core\State\StateInterface;
use Drupal\Core\Render\RendererInterface;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\Yaml\Yaml;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Component\Utility\Html;

/**
 * Default implementation of UpdateManagerInterface.
 */
class UpdateManager implements UpdateManagerInterface {
  use DependencySerializationTrait;
  use StringTranslationTrait;

  protected $cache_bin = 'update_premium:projects';

  /**
   * The update settings
   *
   * @var \Drupal\Core\Config\Config
   */
  protected $updateSettings;

  /**
   * An array of installed and enabled projects.
   *
   * @var array
   */
  protected $projects;

  /**
   * The cache backend.
   *
   * @var \Drupal\Core\Cache\CacheBackendInterface
   */
  protected $cache;

  /**
   * The HTTP client to fetch the feed data with.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  protected $httpClient;

  /**
   * The module handler service.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * The theme handler.
   *
   * @var \Drupal\Core\Extension\ThemeHandlerInterface
   */
  protected $themeHandler;

  /**
   * The state service.
   *
   * @var \Drupal\Core\State\StateInterface
   */
  protected $stateStore;

  /**
   * The renderer service.
   *
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected $renderer;

  /**
   * Constructs a UpdateManager.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache
   *   The cache backend.
   * @param \GuzzleHttp\ClientInterface $http_client
   *   A Guzzle client object.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler
   * @param \Drupal\Core\Extension\ThemeHandlerInterface $theme_handler
   *   The theme handler.
   * @param \Drupal\Core\State\StateInterface $state_store
   *   The state service.
   * @param \Drupal\Core\Render\RendererInterface $renderer
   *   The renderer service.
   */
  public function __construct(ConfigFactoryInterface $config_factory, CacheBackendInterface $cache, ClientInterface $http_client, ModuleHandlerInterface $module_handler, ThemeHandlerInterface $theme_handler, StateInterface $state_store, RendererInterface $renderer) {
    $this->updateSettings = $config_factory->get('update.settings');
    $this->httpClient = $http_client;
    $this->moduleHandler = $module_handler;
    $this->themeHandler = $theme_handler;
    $this->stateStore = $state_store;
    $this->cache = $cache;
    $this->renderer = $renderer;
    $this->projects = [];
  }

  /**
   * {@inheritdoc}
   */
  public function checkUpdates($manual = FALSE) {
    $projects = $this->getProjects();
    $projects_hash = md5(serialize($projects));
    // This can be in the middle of a long-running batch, so REQUEST_TIME won't
    // necessarily be valid.
    $request_time_difference = time() - REQUEST_TIME;
    $frequency = $this->updateSettings->get('check.interval_days');
    $interval = 60 * 60 * 24 * $frequency;
    $last_check = $this->stateStore->get('update_premium.last_check') ?: 0;
    $cached_hash = $this->stateStore->get('update_premium.projects_hash') ?: 0;
    if ($cached_hash != $projects_hash) {
      $manual = TRUE;
      $this->stateStore->set('update_premium.projects_hash', $projects_hash);
    }

    if ($manual) {
      $this->cache->delete($this->cache_bin);
      $this->processUpdates($projects);
      Cache::invalidateTags(['update_premium_report']);
      $this->stateStore->set('update_premium.last_check', REQUEST_TIME + $request_time_difference);
    }
    else {
      if ((REQUEST_TIME - $last_check) > $interval) {
        $this->cache->delete($this->cache_bin);
        $this->processUpdates($projects);
        Cache::invalidateTags(['update_premium_report']);
        $this->stateStore->set('update_premium.last_check', REQUEST_TIME + $request_time_difference);
      }
      else {
        $this->processUpdates($projects);
      }
    }
    if ($cache = $this->cache->get($this->cache_bin)) {
      $projects = $cache->data;
    }
    else {
      $this->cache->set($this->cache_bin, $projects);
    }
    return $projects;
  }

  /**
   * {@inheritdoc}
   */
  public function processUpdates(&$projects) {
    if (!empty($projects['modules'])) {
      foreach ($projects['modules'] as $module => $info) {
        $remote = $this->fetchProject($info['update_server']);
        $this->cleanupData($remote);
        $projects['modules'][$module]['core_compatible'] = $this->checkCoreCompatibility($remote);
        if (!empty($remote['machine_name']) && $remote['machine_name'] == $module && !empty($remote['type']) && $remote['type'] == 'module') {
          $projects['modules'][$module]['update_available'] = $remote;
          if (!empty($remote['version']) && $remote['version'] != $info['version']) {
            $projects['modules'][$module]['status'] = $this->updateStatus($remote);
            $projects['modules'][$module]['status_icon'] = $this->updateStatusIcon($projects['modules'][$module]['status']);
          }
          else {
            $projects['modules'][$module]['status'] = 'success';
            $projects['modules'][$module]['status_icon'] = $this->updateStatusIcon('success');
          }
        }
        else {
          $projects['modules'][$module]['status'] = 'success';
          $projects['modules'][$module]['status_icon'] = $this->updateStatusIcon('success');
        }
      }
    }
    if (!empty($projects['themes'])) {
      foreach ($projects['themes'] as $theme => $info) {
        $remote = $this->fetchProject($info['update_server']);
        $this->cleanupData($remote);
        $projects['themes'][$theme]['core_compatible'] = $this->checkCoreCompatibility($remote);
        if (!empty($remote['machine_name']) && $remote['machine_name'] == $module && !empty($remote['type']) && $remote['type'] == 'theme') {
          $projects['themes'][$theme]['update_available'] = $remote;
          if (!empty($remote['version']) && $remote['version'] != $info['version']) {
            $projects['themes'][$theme]['status'] = $this->updateStatus($remote);
            $projects['themes'][$theme]['status_icon'] = $this->updateStatusIcon($projects['themes'][$theme]['status']);
          }
          else {
            $projects['themes'][$theme]['status'] = 'success';
            $projects['themes'][$theme]['status_icon'] = $this->updateStatusIcon('success');
          }
        }
        else {
          $projects['themes'][$theme]['status'] = 'success';
          $projects['themes'][$theme]['status_icon'] = $this->updateStatusIcon('success');
        }
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getProjects() {
    $updates = $this->moduleHandler->invokeAll('update_premium');
    foreach ($updates as $item) {
      $params = '';
      $item['parameters']['php'] = phpversion();
      $item['parameters']['core'] = \Drupal::VERSION;
      $type = ($item['category'] == 'modules') ? 'module' : 'theme';
      $item['info_file'] = $this->getYamlInfo($item['name'], $type);
      if (!empty($item['info_file']['version'])) {
        $item['parameters']['installed_version'] = $item['info_file']['version'];
      }
      if (!empty($item['parameters'])) {
        $params .= '?';
        foreach ($item['parameters'] as $k => $v) {
          $params .= $k . '=' . $v . '&';
        }
      }
      $this->projects[$item['category']][$item['name']] = [
        'update_server' => $item['update_server'] . $params,
        'project_url' => !empty($item['project_url']) ? $item['project_url'] : '',
      ];
      $this->projects[$item['category']][$item['name']] = array_merge($this->projects[$item['category']][$item['name']], $item['info_file']);
      $version = !empty($this->projects[$item['category']][$item['name']]['version']) ? $this->projects[$item['category']][$item['name']]['version'] : '';
      if ($version && $version == 'VERSION') {
        $this->projects[$item['category']][$item['name']]['version'] = \Drupal::VERSION;
      }
    }
    return $this->projects;
  }

  /**
   * {@inheritdoc}
   */
  public function fetchProject($url) {
    $data = [];
    try {
      $data = (string) $this->httpClient->get($url, ['headers' => ['Accept' => 'application/json']])->getBody();
    }
    catch (RequestException $e) {
      \Drupal::logger('update_premium')->error($e->getMessage());
    }
    return !is_array($data) ? json_decode($data, TRUE) : [];
  }

  /**
   * {@inheritdoc}
   */
  public function getYamlInfo($name, $type = 'module') {
    if ($type == 'module') {
      $path = $this->moduleHandler->getModule($name)->getPathname();
    }
    else {
      $path = $this->themeHandler->getTheme($name)->getPathname();
    }
    $data = Yaml::parse(file_get_contents(DRUPAL_ROOT . '/' . $path));
    return $data;
  }

  /**
   * Check update status.
   */
  protected function updateStatus($project) {
    $status = 'success';
    if (!empty($project) && empty($project['code'])) {
      if (!empty($project['security_update'])) {
        $status = 'error';
      }
      else {
        $status = 'warning';
      }
    }
    return $status;
  }

  /**
   * Rendered status icon.
   */
  protected function updateStatusIcon($status) {
    switch ($status) {
      case 'error':
        $uri = 'core/misc/icons/e32700/error.svg';
        break;
      case 'warning':
        $uri = 'core/misc/icons/e29700/warning.svg';
        break;
      default:
        $uri = 'core/misc/icons/73b355/check.svg';
        break;
    }
    $icon = [
      '#theme' => 'image',
      '#width' => 18,
      '#height' => 18,
      '#uri' => $uri,
    ];
    return $this->renderer->renderPlain($icon);
  }

  /**
   * Cleanup remote data.
   */
  protected function cleanupData(&$data) {
    if (!empty($data) && is_array($data)) {
      foreach ($data as $key => &$value) {
        if (is_array($value)) {
          $this->cleanupData($value);
        }
        else {
          $data[Html::escape($key)] = Html::escape($value);
        }
      }
    }
  }

  /**
   * Check if update version is compatible with current Drupal core.
   */
  protected function checkCoreCompatibility($remote) {
    if (!empty($remote['core']) && version_compare(\Drupal::VERSION, $remote['core']) > 0) {
      // Compatible with current Drupal version.
      return TRUE;
    }
    // Not compatible.
    return FALSE;
  }

}
