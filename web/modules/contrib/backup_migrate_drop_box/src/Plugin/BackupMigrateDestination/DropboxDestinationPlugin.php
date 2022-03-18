<?php

namespace Drupal\backup_migrate_drop_box\Plugin\BackupMigrateDestination;

use Drupal\backup_migrate\Drupal\EntityPlugins\DestinationPluginBase;

/**
 * Defines a Dropbox destination plugin.
 *
 * @BackupMigrateDestinationPlugin(
 *   id = "dropbox",
 *   title = @Translation("Dropbox"),
 *   description = @Translation("Backup to Dropbox storage."),
 *   wrapped_class = "\Drupal\backup_migrate_drop_box\Destination\DropboxDestination"
 * )
 *
 * Note: It is unclear why the plugin is constructed with wrapped_class. To keep
 * things consistent, the deprecated Psr4ClassLoader is called in
 * backup_migrate_drop_box.module.
 *
 * @see \Drupal\backup_migrate\Drupal\EntityPlugins\WrapperPluginBase::getObject()
 */
class DropboxDestinationPlugin extends DestinationPluginBase {
}
