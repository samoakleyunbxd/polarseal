<?php

namespace Drupal\external_media_premium\Plugin\ExternalMedia;

use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\external_media_premium\Plugin\ExternalMediaPremiumBase;
use GuzzleHttp\Client;

/**
 * Pexels picker plugin.
 *
 * @ExternalMedia(
 *   id = "pexels_picker",
 *   name = @Translation("Pexels"),
 *   description = @Translation("Pexels photo picker"),
 *   css_class = "pexels-picker",
 *   icon = "pexels.png",
 *   website = "https://www.pexels.com/",
 *   module = "external_media_premium"
 * )
 */
class Pexels extends ExternalMediaPremiumBase {

  /**
   * @var \GuzzleHttp\Client
   */
  private $client;

  /**
   * {@inheritdoc}
   */
  public function getAttachments() {
    return [
      'library' => ['external_media_premium/external_media_premium.' . $this->getPluginId()],
      'drupalSettings' => [
        'pexels_url' => $this->getRedirectUrl()->toString() . '?q=' . uniqid(), // ?q= to make sure page doesn't get cached.
        'pexels_class' => $this->getClassName(),
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getLibraries() {
    return [
      'js' => [
        'js/pexels.js' => [],
      ],
      'dependencies' => ['core/drupal', 'core/jquery', 'core/drupalSettings', 'external_media_premium/external_media_premium.core'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function configForm(array $form, FormStateInterface $form_state) {
    $form[$this->getPluginId()]['pexels_picker'] = [
      '#title' => $this->t('API Key'),
      '#type' => 'textfield',
      '#default_value' => $this->getSetting('pexels_picker'),
      '#description' => $this->t('Login or register to obtain <a href="https://www.pexels.com/api/new/" target="_blank">Pexels API key</a>.'
      ),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function getRestResponse() {
    if ($api_key = $this->getSetting('pexels_picker')) {
      $request = \Drupal::request()->query;
      $query = $request->get('query');
      $page = !empty($request->get('page')) ? $request->get('page') : 1;
      $type = $request->get('image-list-type');

      if ($type == 'search') {
        $response = json_decode($this->search($query, 30, $page)->getBody());
      }
      else {
        $response = json_decode($this->curated(30, $page)->getBody());
      }
      return !empty($response->photos) ? json_decode(json_encode($response->photos), TRUE) : [];
    }
    else {
      return [];
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getFile($url, $destination) {
    $parts = parse_url($url);
    parse_str($parts['query'], $query);
    return [
      'source' => $url,
      'destination' => $destination . '/' . basename($parts['path']),
    ];
  }

  /**
   * @return \GuzzleHttp\Client
   */
  private function getClient() {
    if (null === $this->client) {
      $this->client = new Client([
        'base_uri' => 'https://api.pexels.com/v1/',
        'headers' => [
          'Authorization' => $this->getSetting('pexels_picker')
        ]
      ]);
    }
    return $this->client;
  }

  /**
   * Search photos.
   */
  protected function search($query, $size = 15, $page = 1) {
    return $this->getClient()->get('search?' . http_build_query([
      'query' => $query,
      'per_page' => $size,
      'page' => $page
    ]));
  }

  /**
   * Get curated photos.
   */
  protected function curated($size = 15, $page = 1) {
    return $this->getClient()->get('curated?' . http_build_query([
      'per_page' => $size,
      'page' => $page
    ]));
  }

}
