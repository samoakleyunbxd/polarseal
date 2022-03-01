<?php

namespace Drupal\external_media_premium\Plugin\ExternalMedia;

use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\external_media_premium\Plugin\ExternalMediaPremiumBase;
use Pixabay\PixabayClient;

/**
 * Pixabay picker plugin.
 *
 * @ExternalMedia(
 *   id = "pixabay_picker",
 *   name = @Translation("Pixabay"),
 *   description = @Translation("Pixabay photo picker"),
 *   css_class = "pixabay-picker",
 *   icon = "pixabay.png",
 *   website = "https://pixabay.com/",
 *   module = "external_media_premium"
 * )
 */
class Pixabay extends ExternalMediaPremiumBase {

  /**
   * {@inheritdoc}
   */
  public function classExists() {
    return class_exists('\Pixabay\PixabayClient');
  }

  /**
   * {@inheritdoc}
   */
  public function getAttachments() {
    return [
      'library' => ['external_media_premium/external_media_premium.' . $this->getPluginId()],
      'drupalSettings' => [
        'pixabay_url' => $this->getRedirectUrl()->toString() . '?q=' . uniqid(), // ?q= to make sure page doesn't get cached.
        'pixabay_class' => $this->getClassName(),
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getLibraries() {
    return [
      'js' => [
        'js/pixabay.js' => [],
      ],
      'dependencies' => ['core/drupal', 'core/jquery', 'core/drupalSettings', 'external_media_premium/external_media_premium.core'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function configForm(array $form, FormStateInterface $form_state) {
    $form[$this->getPluginId()]['pixabay_picker'] = [
      '#title' => $this->t('API Key'),
      '#type' => 'textfield',
      '#default_value' => $this->getSetting('pixabay_picker'),
      '#description' => $this->t('Login or register on <a href="https://pixabay.com/" target="_blank">Pixabay</a> and open <a href="https://pixabay.com/api/docs/" target="_blank">Documentation page</a> to find your API Key.'
      ),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function getRestResponse() {
    if ($api_key = $this->getSetting('pixabay_picker')) {
      $request = \Drupal::request()->query;
      $params = [];
      $params['q'] = $request->get('query');
      $params['page'] = !empty($request->get('page')) ? $request->get('page') : 1;
      $params['orientation'] = !empty($request->get('orientation')) ? $request->get('orientation') : 'all';
      $params['image_type'] = !empty($request->get('image_type')) ? $request->get('image_type') : 'all';

      $pixabayClient = new PixabayClient([
        'key' => $api_key,
        'per_page' => 30,
      ]);
      if ($request->get('type') == 'image') {
        $results = $pixabayClient->getImages($params, true);
      }
      else {
        $results = $pixabayClient->getVideos($params, true);
      }
      return !empty($results['hits']) ? $results['hits'] : [];
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
    return [
      'source' => $url,
      'destination' => $destination . '/' . basename($parts['path']),
    ];
  }

}
