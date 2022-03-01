<?php

namespace Drupal\external_media_premium\Element;

/**
 * Provides a webform element for an 'external_media' element.
 *
 * @FormElement("webform_external_media_image")
 */
class WebformExternalMediaImage extends WebformExternalMediaFile {

  /**
   * {@inheritdoc}
   */
  protected static $accept = 'image/*';

}
