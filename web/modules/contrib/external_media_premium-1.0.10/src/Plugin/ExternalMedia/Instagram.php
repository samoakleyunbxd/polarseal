<?php

namespace Drupal\external_media_premium\Plugin\ExternalMedia;

use Drupal\Core\Url;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\external_media_premium\Plugin\ExternalMediaPremiumBase;
use EspressoDev\InstagramBasicDisplay\InstagramBasicDisplay;

/**
 * Instagram picker plugin.
 *
 * @ExternalMedia(
 *   id = "instagram_picker",
 *   name = @Translation("Instagram"),
 *   description = @Translation("Instagram photo picker"),
 *   css_class = "instagram-picker",
 *   icon = "instagram.png",
 *   module = "external_media_premium"
 * )
 */
class Instagram extends ExternalMediaPremiumBase {

  /**
   * {@inheritdoc}
   */
  public function classExists() {
    return class_exists('\EspressoDev\InstagramBasicDisplay\InstagramBasicDisplay');
  }

  /**
   * {@inheritdoc}
   */
  public function getAttachments() {
    return [
      'library' => ['external_media_premium/external_media_premium.' . $this->getPluginId()],
      'drupalSettings' => [
        'instagram_redirect_url' => $this->getRedirectUrl()->toString() . '?q=' . uniqid(), // ?q= to make sure page doesn't get cached.
        'instagram_token' => ($token = $this->getStorage('token')) ? $token : '',
        'instagram_class' => $this->getClassName(),
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getLibraries() {
    return [
      'js' => [
        'js/instagram.js' => [],
      ],
      'dependencies' => ['core/drupal', 'core/jquery', 'core/drupalSettings', 'external_media_premium/external_media_premium.core'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function configForm(array $form, FormStateInterface $form_state) {
    $form[$this->getPluginId()]['instagram_app_id'] = [
      '#title' => $this->t('App ID'),
      '#type' => 'textfield',
      '#default_value' => $this->getSetting('instagram_app_id'),
      '#description' => $this->t('To use the Instagram Basic Display API follow the <a href="https://developers.facebook.com/docs/instagram-basic-display-api/getting-started" target="_blank">getting started guide</a>.'),
    ];
    $form[$this->getPluginId()]['instagram_app_secret'] = [
      '#title' => $this->t('App Secret'),
      '#type' => 'textfield',
      '#default_value' => $this->getSetting('instagram_app_secret'),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigForm(array &$form, FormStateInterface $form_state) {
    $this
      ->setSetting('instagram_app_id', $form_state->getValue('instagram_app_id'))
      ->setSetting('instagram_app_secret', $form_state->getValue('instagram_app_secret'));
  }

  /**
   * {@inheritdoc}
   */
  public function renderPopupContents() {
    $date = new \DateTime();
    $token_expiration = (int) $this->getStorage('token_expiration');
    $code = \Drupal::request()->query->get('code');

    $instagram = new InstagramBasicDisplay([
      'appId' => $this->getSetting('instagram_app_id'),
      'appSecret' => $this->getSetting('instagram_app_secret'),
      'redirectUri' => $this->getRedirectUrl()->toString(),
    ]);
    if (empty($code) && (empty($token_expiration) || $token_expiration < $date->format('U'))) {
      // Reset stored token.
      $this->setStorage('token', 0);
      $response = new RedirectResponse($instagram->getLoginUrl());
      $response->send();
    }

    if (!empty($code)) {
      // Get the short lived access token (valid for 1 hour)
      $token = $instagram->getOAuthToken($code, true);
      // Exchange this token for a long lived token (valid for 60 days)
      if ($token = $instagram->getLongLivedToken($token, true)) {
        $date->modify('+59 days');
        $this->setStorage('token_expiration', $date->format('U'));
        $this->setStorage('token', $token);
      }
    }

    $token = $this->getStorage('token');
    $obj = new InstagramBasicDisplay($token);
    $profile = $obj->getUserProfile();

    $theme = parent::renderPopupContents();
    $theme['#profile_name'] = !empty($profile->username) ? $profile->username : '';
    return $theme;
  }

  /**
   * {@inheritdoc}
   */
  public function getRestResponse() {
    if ($token = $this->getStorage('token')) {
      $obj = new InstagramBasicDisplay($token);
      $media = $obj->getUserMedia('me', 99);
      return !empty($media->data) ? json_decode(json_encode($media->data), TRUE) : [];
    }
    else {
      return [];
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getFile($id, $destination) {
    $token = $this->getStorage('token');
    $obj = new InstagramBasicDisplay($token);
    $media = $obj->getMedia($id);
    if (!empty($media->media_url)) {
      $url = $media->media_url;
      $path = parse_url($url, PHP_URL_PATH);
      return [
        'source' => $url,
        'destination' => $destination . '/' . basename($path),
      ];
    }
    return;
  }

  /**
   * {@inheritdoc}
   */
  public function setRedirectCallback() {
    return $this->getLibraries();
  }

}
