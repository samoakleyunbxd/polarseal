<?php

namespace Drupal\external_media_premium\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class LicenseForm.
 *
 * @ingroup external_media_premium
 */
class LicenseForm extends ConfigFormBase {

  const CONFIG_NAME = 'external_media_premium.config';

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [static::CONFIG_NAME];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'external_media_premium_license';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);
    // Get the working configuration.
    $config = $this->config(static::CONFIG_NAME);

    $form['license_email'] = [
      '#type'          => 'email',
      '#title'         => $this->t('License Email'),
      '#description'   => $this->t('Email address that you used to purchase the module.'),
      '#default_value' => $config->get('license_email'),
      '#required'      => TRUE,
    ];

    $form['license_number'] = [
      '#type'          => 'textfield',
      '#title'         => $this->t('License Number'),
      '#description'   => $this->t('You may find this license number in your purchase confirmation email.'),
      '#default_value' => $config->get('license_number'),
      '#required'      => TRUE,
    ];

    $form['actions']['submit']['#value'] = $this->t('Register License');

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);
    $this->config(static::CONFIG_NAME)
      ->set('license_email', $form_state->getValue('license_email'))
      ->set('license_number', $form_state->getValue('license_number'))
      ->save();
  }

}
