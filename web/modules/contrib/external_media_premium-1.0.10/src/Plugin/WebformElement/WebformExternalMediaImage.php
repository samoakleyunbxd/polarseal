<?php

namespace Drupal\external_media_premium\Plugin\WebformElement;

use Drupal\Core\Form\FormStateInterface;
use Drupal\webform\Plugin\WebformElement\WebformImageFile;
use Drupal\webform\WebformSubmissionInterface;

/**
 * Provides a 'webform_external_media_image' element.
 *
 * @WebformElement(
 *   id = "webform_external_media_image",
 *   label = @Translation("External Media Image"),
 *   description = @Translation("Import files from third-party services."),
 *   category = @Translation("File upload elements"),
 *   states_wrapper = TRUE,
 *   dependencies = {
 *     "file",
 *   }
 * )
 */
class WebformExternalMediaImage extends WebformImageFile {

  /**
   * {@inheritdoc}
   */
  protected function defineDefaultProperties() {
    $properties = parent::defineDefaultProperties() + [
      'visible_widgets' => '',
    ];
    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public function prepare(array &$element, WebformSubmissionInterface $webform_submission = NULL) {
    parent::prepare($element, $webform_submission);
    $visible_widgets = $this->getElementProperty($element, 'visible_widgets');
    if (!empty($visible_widgets)) {
      $element['#visible_widgets'] = array_keys(array_filter($visible_widgets));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);
    $form['element']['multiple']['#prefix'] = '<div class="hidden">';
    $form['element']['multiple']['#suffix'] = '</div>';
    $options = [];
    foreach (\Drupal::service('plugin.manager.external_media')->getDefinitions() as $plugin) {
      $external_media = \Drupal::service('plugin.manager.external_media')->createInstance($plugin['id']);
      $has_access = \Drupal::currentUser()->hasPermission('upload from ' . $external_media->getPluginId());
      if ($has_access && $external_media->getSetting('enabled') && $external_media->classExists()) {
        $options[$plugin['id']] = $external_media->getName();
      }
    }
    $form['element']['visible_widgets'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Visible widgets'),
      '#options' => $options,
      '#description' => $this->t('By default all widgets are visible.'),
    ];
    return $form;
  }

}
