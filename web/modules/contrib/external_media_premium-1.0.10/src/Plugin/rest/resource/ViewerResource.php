<?php

namespace Drupal\external_media_premium\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ModifiedResourceResponse;

/**
 * External Media viewer data resource.
 *
 * @RestResource(
 *   id = "external_media",
 *   label = @Translation("External Media"),
 *   uri_paths = {
 *     "canonical" = "/external-media/resource/{external_media}"
 *   }
 * )
 */
class ViewerResource extends ResourceBase {

  public function get($external_media) {
    $external_media = \Drupal::service('plugin.manager.external_media')->createInstance($external_media);
    $payload = [];
    if ($external_media->classExists()) {
      $payload = $external_media->getRestResponse();
    }
    return new ModifiedResourceResponse($payload);
  }

}
