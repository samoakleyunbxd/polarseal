<?php

namespace Drupal\external_media_premium\Plugin\ExternalMedia;

use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\external_media_premium\Plugin\ExternalMediaPremiumBase;
use Crew\Unsplash\HttpClient;
use Crew\Unsplash\Search;
use Crew\Unsplash\Photo;

/**
 * Unsplash picker plugin.
 *
 * @ExternalMedia(
 *   id = "unsplash_picker",
 *   name = @Translation("Unsplash"),
 *   description = @Translation("Unsplash photo picker"),
 *   css_class = "unsplash-picker",
 *   icon = "unsplash.png",
 *   website = "https://unsplash.com/",
 *   module = "external_media_premium"
 * )
 */
class Unsplash extends ExternalMediaPremiumBase {

  /**
   * {@inheritdoc}
   */
  public function classExists() {
    return class_exists('\Crew\Unsplash\HttpClient');
  }

  /**
   * {@inheritdoc}
   */
  public function getAttachments() {
    return [
      'library' => ['external_media_premium/external_media_premium.' . $this->getPluginId()],
      'drupalSettings' => [
        'unsplash_redirect_url' => $this->getRedirectUrl()->toString() . '?q=' . uniqid(), // ?q= to make sure page doesn't get cached.
        'unsplash_class' => $this->getClassName(),
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getLibraries() {
    return [
      'js' => [
        'js/unsplash.js' => [],
      ],
      'dependencies' => ['core/drupal', 'core/jquery', 'core/drupalSettings', 'external_media_premium/external_media_premium.core'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function configForm(array $form, FormStateInterface $form_state) {
    $form[$this->getPluginId()]['unsplash_access_key'] = [
      '#title' => $this->t('Access Key'),
      '#type' => 'textfield',
      '#default_value' => $this->getSetting('unsplash_access_key'),
      '#description' => $this->t('Login to <a href="https://unsplash.com/oauth/applications" target="_blank">Unsplash Developer</a> to get credentials.'
      ),
    ];
    $form[$this->getPluginId()]['unsplash_secret_key'] = [
      '#title' => $this->t('Secret key'),
      '#type' => 'textfield',
      '#default_value' => $this->getSetting('unsplash_secret_key'),
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigForm(array &$form, FormStateInterface $form_state) {
    $this
      ->setSetting('unsplash_access_key', $form_state->getValue('unsplash_access_key'))
      ->setSetting('unsplash_secret_key', $form_state->getValue('unsplash_secret_key'));
  }

  /**
   * {@inheritdoc}
   */
  public function renderPopupContents() {
    $date = new \DateTime();
    $code = \Drupal::request()->query->get('code');
    $token_expiration = (int) $this->getStorage('token_expiration');
    $token = $this->getStorage('token');

    $credentials = [
      'applicationId' => $this->getSetting('unsplash_access_key'),
      'secret' => $this->getSetting('unsplash_secret_key'),
      'callbackUrl' => $this->getRedirectUrl()->toString(),
      'utmSource' => 'Drupal'
    ];

    if (empty($code) &&  (empty($token_expiration) || $token_expiration < $date->format('U'))) {
      HttpClient::init($credentials);
      $httpClient = new HttpClient();
      $this->setStorage('token', 0);
      $response = new RedirectResponse($httpClient::$connection->getConnectionUrl(['public']));
      $response->send();
    }
    
    if (!empty($code) && empty($token)) {
      HttpClient::init($credentials);
      try {
        $token = HttpClient::$connection->generateToken($code);
        $this->setStorage('token', $token);
        $this->setStorage('token_expiration', ($date->format('U') + 4320000));
      }
      catch (Exception $e) {
        \Drupal::logger('external_media_premium')->error('Failed to generate access token: ' . $e->getMessage());
      }
    }

    if ($token = $this->getStorage('token')) {
      try {
        HttpClient::init($credentials, [
          'access_token' => $token->getToken(),
          'expires_in' => 4320000,
          'refresh_token' => $token->getRefreshToken()
        ]);
        $httpClient = new HttpClient();
        $owner = $httpClient::$connection->getResourceOwner();
      }
      catch(\Exception $e) {
        print_r($e->getMessage());exit;
      }
    }

    $theme = parent::renderPopupContents();
    $theme['#profile_name'] = isset($owner) ? $owner->getName() : '';
    return $theme;
  }

  /**
   * {@inheritdoc}
   */
  public function getRestResponse() {
    if ($token = $this->getStorage('token')) {
      HttpClient::init(['utmSource' => 'External Media Premium'], [
        'access_token' => $token->getToken(),
        'expires_in' => 4320000,
        'refresh_token' => $token->getRefreshToken()
      ]);

      $request = \Drupal::request()->query;

      $query = $request->get('query');
      $page = !empty($request->get('page')) ? $request->get('page') : 1;
      $per_page = 99;
      $orientation = !empty($request->get('orientation')) ? $request->get('orientation') : 'landscape';

      $data = Search::photos($query, $page, $per_page, $orientation);
      return $data->getResults();
    }
    else {
      return [];
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getFile($id, $destination) {
    if ($token = $this->getStorage('token')) {
      HttpClient::init(['utmSource' => 'External Media Premium'], [
        'access_token' => $token->getToken(),
        'expires_in' => 4320000,
        'refresh_token' => $token->getRefreshToken()
      ]);
      $photo = Photo::find($id);
      $url = $photo->download();
      $parts = parse_url($url);
      $ext = $this->getRemoteFileExt($url);
      return [
        'source' => $url,
        'destination' => $destination . '/' . basename($parts['path']) . '.' . $ext,
      ];
    }
  }

  /**
   * {@inheritdoc}
   */
  public function setRedirectCallback() {
    return $this->getLibraries();
  }

  /**
   *
   */
  protected function getRemoteFileExt($url) {
    $mimes  = [
      IMAGETYPE_GIF => 'gif',
      IMAGETYPE_JPEG => 'jpg',
      IMAGETYPE_PNG => 'png'
    ];
    $image_type = exif_imagetype($url);
    return !empty($mimes[$image_type]) ? $mimes[$image_type] : '';
  }

}
