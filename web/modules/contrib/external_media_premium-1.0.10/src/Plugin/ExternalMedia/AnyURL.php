<?php

namespace Drupal\external_media_premium\Plugin\ExternalMedia;

use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\external_media_premium\Plugin\ExternalMediaPremiumBase;

/**
 * AnyURL picker plugin.
 *
 * @ExternalMedia(
 *   id = "anyurl_picker",
 *   name = @Translation("URL"),
 *   description = @Translation("Import any remote File"),
 *   css_class = "anyurl-picker",
 *   module = "external_media_premium"
 * )
 */
class AnyURL extends ExternalMediaPremiumBase {

  /**
   * {@inheritdoc}
   */
  public function getAttachments() {
    return [
      'library' => ['external_media_premium/external_media_premium.' . $this->getPluginId()],
      'drupalSettings' => [
        'anyurl_class' => $this->getClassName(),
        'anyurl_url' => $this->getRedirectUrl()->toString(),
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getLibraries() {
    return [
      'js' => [
        'js/anyurl.min.js' => [],
      ],
      'dependencies' => ['core/drupal', 'core/jquery', 'core/drupalSettings', 'external_media_premium/external_media_premium.core'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function configForm(array $form, FormStateInterface $form_state) {
    $form[$this->getPluginId()]['anyurl_instructions']['info'] = [
      '#markup' => '<p>Import files from remote URLs into file and image fields.</p>',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * {@inheritdoc}
   */
  public function renderPopupContents() {
    return parent::renderPopupContents();
  }

  /**
   * {@inheritdoc}
   */
  public function getFile($url, $destination) {
    $decoded = urldecode($url);
    $parts = parse_url($decoded);
    $headers = get_headers($url, 1);
    $raw_ext = ltrim(strstr($url, '.'), '.');
    $ext = '';
    if (empty($raw_ext)) {
      if (!empty($headers['Content-Type'])) {
        if (method_exists($this, 'getExtByMime')) {
          $ext = '.' . $this->externalMedia->getExtByMime(strtolower($headers['Content-Type']));
        }
      }
    }
    return [
      'source' => $url,
      'destination' => $destination . '/' . basename($parts['path']) . $ext,
    ];
  }

}
