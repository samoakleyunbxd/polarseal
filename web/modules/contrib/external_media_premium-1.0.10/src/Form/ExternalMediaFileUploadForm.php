<?php

namespace Drupal\external_media_premium\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\media_library\Form\FileUploadForm;

/**
 * Creates a form to create media entities from uploaded files (External Media support).
 */
class ExternalMediaFileUploadForm extends FileUploadForm {

  /**
   * {@inheritdoc}
   */
  protected function buildInputElement(array $form, FormStateInterface $form_state) {
    $form = parent::buildInputElement($form, $form_state);

    if (empty($form['#attached'])) {
      $form['#attached'] = [];
    }

    // This fixes issue with the Media Library (media reference field) issue.
    $external_media = \Drupal::service('plugin.manager.external_media');
    foreach ($external_media->getDefinitions() as $plugin) {
      $plugin = $external_media->createInstance($plugin['id']);
      $pluginSettings = $plugin->getSettings();
      if (empty($pluginSettings['enabled'])) {
        continue;
      }
      if ($plugin->classExists()) {
        $form['#attached'] = array_merge_recursive($form['#attached'], $plugin->getAttachments());
      }
    }

    $process = (array) $this->elementInfo->getInfoProperty('external_media', '#process', []);
    $form['container']['upload']['#type'] = 'external_media';
    $form['container']['upload']['#upload_location'] = 'public://external-media';
    $form['container']['upload']['#process'] = array_merge(['::validateUploadElement'], $process, ['::processUploadElement']);
    return $form;
  }

}
