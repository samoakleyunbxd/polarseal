<?php

namespace Drupal\external_media_premium\Element;

use Drupal\external_media\Element\ExternalMediaFile;

/**
 * Provides a webform element for an 'external_media' element.
 *
 * @FormElement("webform_external_media_file")
 */
class WebformExternalMediaFile extends ExternalMediaFile {

  /**
   * The types of files that the server accepts.
   *
   * @var string
   *
   * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/input/file#accept
   */
  protected static $accept;

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    $info = parent::getInfo();
    $info['#pre_render'][] = [get_class($this), 'preRenderWebformManagedFile'];
    return $info;
  }

  /**
   * Render API callback: Adds media capture to the managed_file element type.
   */
  public static function preRenderWebformManagedFile($element) {
    // Set accept and capture attributes.
    if (isset($element['upload']) && static::$accept) {
      $element['upload']['#attributes']['accept'] = static::$accept;
    }
    // Add class name to wrapper attributes.
    $class_name = str_replace('_', '-', $element['#type']);
    static::setAttributes($element, ['js-' . $class_name, $class_name]);
    $element['#attached']['library'] = ['external_media/external_media.core'];
    return $element;
  }

}
