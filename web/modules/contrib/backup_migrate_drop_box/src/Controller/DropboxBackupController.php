<?php

namespace Drupal\backup_migrate_drop_box\Controller;

use Drupal\backup_migrate\Drupal\Destination\DrupalBrowserDownloadDestination;
use Drupal\backup_migrate\Entity\Destination;
use Drupal\backup_migrate_drop_box\Destination\DropboxDestination;
use Drupal\Core\Controller\ControllerBase;

/**
 * Dropbox Backup & Migrate Controller.
 *
 * @package Drupal\backup_migrate_drop_box\Controller
 */
class DropboxBackupController extends ControllerBase {

  /**
   * Backup & migrate destination object.
   *
   * @var \Drupal\backup_migrate\Core\Destination\DestinationInterface
   */
  public $destination;

  /**
   * Download a backup via the browser.
   *
   * @param \Drupal\backup_migrate\Entity\Destination $backup_migrate_destination
   *   Backup & migrate destination object.
   * @param string $backup_id
   *   Backup & migrate backup file id.
   *
   * @return \Symfony\Component\HttpFoundation\Response|void
   *   Return http response to download backup file.
   *
   * @throws \Drupal\backup_migrate\Core\Exception\BackupMigrateException
   */
  public function download(Destination $backup_migrate_destination, string $backup_id) {
    $destination = $backup_migrate_destination->getObject();
    $file = $destination->getFile($backup_id);

    if ($destination instanceof DropboxDestination) {
      return $destination->downloadFile($file);
    }
    else {
      $file = $destination->loadFileForReading($file);
      $browser = new DrupalBrowserDownloadDestination();
      $browser->saveFile($file);
    }
  }

}
