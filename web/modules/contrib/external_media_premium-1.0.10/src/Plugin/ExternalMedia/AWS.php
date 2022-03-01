<?php

namespace Drupal\external_media_premium\Plugin\ExternalMedia;

use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\external_media_premium\Plugin\ExternalMediaPremiumBase;

/**
 * Unsplash picker plugin.
 *
 * @ExternalMedia(
 *   id = "aws_picker",
 *   name = @Translation("AWS"),
 *   description = @Translation("AWS file picker"),
 *   css_class = "aws-picker",
 *   icon = "AWS.png",
 *   website = "https://aws.amazon.com/",
 *   module = "external_media_premium"
 * )
 */
class AWS extends ExternalMediaPremiumBase {

  /**
   * {@inheritdoc}
   */
  public function getAttachments() {
    return [
      'library' => ['external_media_premium/external_media_premium.' . $this->getPluginId()],
      'drupalSettings' => [
        'aws_redirect_url' => $this->getRedirectUrl()->toString() . '?q=' . uniqid(), // ?q= to make sure page doesn't get cached.
        'aws_bucket_name' => $this->getSetting('aws_bucket_name'),
        'aws_region' => $this->getSetting('aws_region'),
        'aws_identity_pool_id' => $this->getSetting('aws_identity_pool_id'),
        'aws_icons_path' => $this->getModulePath() . '/img/fs/',
        'aws_class' => $this->getClassName(),
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getLibraries() {
    return [
      'js' => [
        'https://sdk.amazonaws.com/js/aws-sdk-2.894.0.min.js' => ['type' => 'external'],
        'js/aws.min.js' => [],
      ],
      'dependencies' => ['core/drupal', 'core/jquery', 'core/drupalSettings', 'external_media_premium/external_media_premium.core'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function configForm(array $form, FormStateInterface $form_state) {
    $form[$this->getPluginId()]['aws_bucket_name'] = [
      '#title' => $this->t('Bucket name'),
      '#type' => 'textfield',
      '#default_value' => $this->getSetting('aws_bucket_name'),
      '#description' => $this->t(''),
    ];
    $form[$this->getPluginId()]['aws_region'] = [
      '#title' => $this->t('Region'),
      '#type' => 'textfield',
      '#default_value' => $this->getSetting('aws_region'),
    ];
    $form[$this->getPluginId()]['aws_identity_pool_id'] = [
      '#title' => $this->t('Identity Pool ID'),
      '#type' => 'textfield',
      '#default_value' => $this->getSetting('aws_identity_pool_id'),
    ];
    $form[$this->getPluginId()]['aws_instructions'] = [
      '#type'  => 'fieldset',
      '#title' => t('Configuration instructions'),
    ];
    $form[$this->getPluginId()]['aws_instructions']['info'] = [
      '#markup' => '<p>Please make sure files in the bucket are publicly accessible otherwise the module will not import selected files.</p>',
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigForm(array &$form, FormStateInterface $form_state) {
    $this
      ->setSetting('aws_bucket_name', $form_state->getValue('aws_bucket_name'))
      ->setSetting('aws_region', $form_state->getValue('aws_region'))
      ->setSetting('aws_identity_pool_id', $form_state->getValue('aws_identity_pool_id'));
  }

  /**
   * {@inheritdoc}
   */
  public function renderPopupContents() {
    $theme = parent::renderPopupContents();
    $theme['#profile_name'] = 'Icon made by&nbsp;<a href="https://www.flaticon.com/authors/dinosoftlabs" target="_blank">DinosoftLabs</a>&nbsp;from&nbsp;<a href="http://www.flaticon.com/" target="_blank" rel="noopener noreferrer">www.flaticon.com</a>';
    return $theme;
  }

  /**
   * {@inheritdoc}
   */
  public function getFile($url, $destination) {
    $decoded = urldecode($url);
    $parts = parse_url($decoded);
    return [
      'source' => $url,
      'destination' => $destination . '/' . basename($parts['path']),
    ];
  }

}
