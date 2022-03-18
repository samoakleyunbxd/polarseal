<?php

namespace Drupal\backup_migrate_drop_box\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Dropbox Backup & Migrate Route Subscriber.
 */
class DropboxRouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    if ($route = $collection->get('entity.backup_migrate_destination.backup_download')) {
      $route->setDefaults([
        '_controller' => '\Drupal\backup_migrate_drop_box\Controller\DropboxBackupController::download',
      ]);
    }
  }

}
