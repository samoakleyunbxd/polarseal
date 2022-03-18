<?php

namespace Drupal\backup_migrate_drop_box\Destination;

use Kunnu\Dropbox\DropboxApp;
use Kunnu\Dropbox\Dropbox;
use Kunnu\Dropbox\Models\FileMetadata;

use Drupal\backup_migrate\Core\Config\ConfigInterface;
use Drupal\backup_migrate\Core\Config\ConfigurableInterface;
use Drupal\backup_migrate\Core\Exception\BackupMigrateException;
use Drupal\backup_migrate\Core\Destination\RemoteDestinationInterface;
use Drupal\backup_migrate\Core\Destination\ListableDestinationInterface;
use Drupal\backup_migrate\Core\File\BackupFile;
use Drupal\backup_migrate\Core\Destination\ReadableDestinationInterface;
use Drupal\backup_migrate\Core\File\BackupFileInterface;
use Drupal\backup_migrate\Core\File\BackupFileReadableInterface;
use Drupal\backup_migrate\Core\Destination\DestinationBase;
use Drupal\Core\Logger\LoggerChannelTrait;
use Drupal\Core\Messenger\MessengerTrait;
use Drupal\Core\Url;

use Kunnu\Dropbox\Exceptions\DropboxClientException;
use Symfony\Component\HttpFoundation\Response;

/**
 * Dropbox Backup & Migrate Destination.
 *
 * @package Drupal\backup_migrate_drop_box\Destination
 */
class DropboxDestination extends DestinationBase implements RemoteDestinationInterface, ListableDestinationInterface, ReadableDestinationInterface, ConfigurableInterface {

  use MessengerTrait;
  use LoggerChannelTrait;

  /**
   * Dropbox Client.
   *
   * @var \Kunnu\Dropbox\Dropbox
   */
  protected $client = NULL;

  /**
   * Key repository service.
   *
   * @var \Drupal\key\KeyRepository
   */
  protected $keyRepository = NULL;

  /**
   * File repository service.
   *
   * @var \Drupal\file\FileRepository
   */
  protected $fileRepository = NULL;

  /**
   * Filesystem service.
   *
   * @var \Drupal\Core\File\FileSystem
   */
  protected $fileSystem = NULL;

  /**
   * {@inheritdoc}
   */
  public function __construct(ConfigInterface $config) {
    parent::__construct($config);

    /** @codingStandardsIgnoreStart */

    /**
     * @var \Drupal\key\KeyRepository keyRepository
     */
    $this->keyRepository = \Drupal::service('key.repository');

    /**
     * @var \Drupal\file\FileRepository fileRepository
     */
    $this->fileRepository = \Drupal::service('file.repository');

    /**
     * @var \Drupal\Core\File\FileSystem fileSystem
     */
    $this->fileSystem = \Drupal::service('file_system');

    /** @codingStandardsIgnoreEnd */
  }

  /**
   * Get app key.
   *
   * @return mixed|string|null
   */
  private function getAppKey() {
    $appKey = NULL;
    if ($appKeyName = $this->confGet('dropbox_app_key_name')) {
      $appKey = $this->keyRepository->getKey($appKeyName)->getKeyValue();
    }
    return $appKey;
  }

  /**
   * Get app secret.
   *
   * @return mixed|string|null
   */
  private function getAppSecret() {
    $appSecret = NULL;
    if ($appSecretKeyName = $this->confGet('dropbox_app_secret_key_name')) {
      $appSecret = $this->keyRepository->getKey($appSecretKeyName)->getKeyValue();
    }
    return $appSecret;
  }

  /**
   * Get access token.
   *
   * @return mixed|string|null
   */
  private function getAccessToken() {
    $accessToken = NULL;
    if ($accessTokenKeyName = $this->confGet('dropbox_access_token_key_name')) {
      $accessToken = $this->keyRepository->getKey($accessTokenKeyName)->getKeyValue();
    }
    return $accessToken;
  }

  /**
   * Download backup file.
   *
   * @param \Drupal\backup_migrate\Core\File\BackupFileInterface $file
   *   Backup file.
   *
   * @return \Symfony\Component\HttpFoundation\Response|void
   *   Returns http file response.
   */
  public function downloadFile(BackupFileInterface $file) {
    $id = $file->getMeta('id');
    if ($this->fileExists($id)) {
      $prefix = '/';
      try {
        $file = $this->getClient()->download($prefix . $id);
        if ($file) {
          $fileData = $file->getData();
          $fileInfo = pathinfo($fileData['name']);
          $contentType = 'application/octet-stream';
          if ($fileInfo && $fileInfo['extension'] == 'sql') {
            $contentType = 'application/sql';
          }
          if ($fileInfo && $fileInfo['extension'] == 'gz') {
            $contentType = 'application/gzip';
          }
          return new Response(
            $file->getContents(),
            Response::HTTP_OK,
            ['content-type' => $contentType]
          );
        }
        else {
          $this->getLogger('backup_migrate_drop_box')
            ->warning('Backup file was not found. Unable to download backup file.');
        }
      } catch (DropboxClientException $e) {
        watchdog_exception('backup_migrate_drop_box - downloadFile()', $e);
      }
    }
    else {
      $this->getLogger('backup_migrate_drop_box')
        ->warning('Backup file was not found. Unable to download backup file.');
    }
  }

  /**
   * Get Dropbox Client.
   *
   * @return \Kunnu\Dropbox\Dropbox|null
   *
   * @throws \Kunnu\Dropbox\Exceptions\DropboxClientException
   */
  public function getClient(): ?Dropbox {
    // Check client.
    if ($this->client == NULL) {

      // Get app key.
      $appKey = $this->getAppKey();
      if (empty($appKey)) {
        $this->getLogger('backup_migrate_drop_box')
          ->warning('App key not configured.');
        return NULL;
      }

      // Get app secret.
      $appSecret = $this->getAppSecret();
      if (empty($appSecret)) {
        $this->getLogger('backup_migrate_drop_box')
          ->warning('App Secret not configured.');
        return NULL;
      }

      // Get access token.
      $accessToken = $this->getAccessToken();
      if (empty($accessToken)) {
        $this->getLogger('backup_migrate_drop_box')
          ->warning('Access token not configured.');
        return NULL;
      }

      $app = new DropboxApp($appKey, $appSecret, $accessToken);
      $this->client = new Dropbox($app);
    }

    // Return client.
    return $this->client;
  }

  /**
   * {@inheritdoc}
   */
  public function checkWritable(): bool {
    return TRUE;
  }

  /**
   * @inheritDoc
   */
  protected function deleteTheFile($id) {
    if ($this->fileExists($id)) {
      $prefix = '/';
      try {
        $deletedFile = $this->getClient()->delete($prefix . $id);
        if ($deletedFile) {
          $this->messenger()->addMessage($this->t('Backup file %file_name was deleted.', ['%file_name' => $deletedFile->getName()]));
        }
      } catch (DropboxClientException $e) {
        watchdog_exception('backup_migrate_drop_box - deleteTheFile()', $e);
      }
    } else {
      $this->getLogger('backup_migrate_drop_box')->warning('Unable to delete backup file. File was not found.');
    }
  }

  /**
   * @inheritDoc
   *
   * @throws \Drupal\backup_migrate\Core\Exception\BackupMigrateException
   */
  protected function saveTheFile(BackupFileReadableInterface $file): ?FileMetadata {
    $dropboxFile = NULL;
    if (file_exists($file->realpath())) {
      $prefix = '/';
      try {
        $dropboxFile = $this->getClient()->upload($file->realpath(), $prefix . $file->getFullName(), ['autorename' => true]);
        if ($dropboxFile) {
          $this->messenger()->addMessage($this->t('Backup file %file_name was uploaded.', ['%file_name' => $dropboxFile->getName()]));
        }
      } catch (DropboxClientException $e) {
        $this->getLogger('backup_migrate_drop_box')->error($e->getMessage());
        throw new BackupMigrateException('Could not upload to Dropbox: %err (code: %code)', [
          '%err' => $e->getMessage(),
          '%code' => $e->getCode(),
        ]);
      }
    }
    else {
      $this->getLogger('backup_migrate_drop_box')->warning('Backup file was not found.');
    }
    return $dropboxFile;
  }

  /**
   * @inheritDoc
   */
  protected function saveTheFileMetadata(BackupFileInterface $file) {
    // Nothing to do here.
  }

  /**
   * @inheritDoc
   */
  protected function loadFileMetadataArray(BackupFileInterface $file) {
    // Nothing to do here.
  }

  /**
   * @inheritDoc
   */
  public function listFiles(): array {
    $files = [];
    $prefix = '/';

    try {
      $listFolderContents = $this->getClient()->listFolder($prefix);
      $items = $listFolderContents->getItems();

      /** @var FileMetadata $item */
      foreach ($items->all() as $item) {
        // Setup new backup file.
        $backupFile = new BackupFile();
        $backupFile->setMeta('id', $item->getName());
        $backupFile->setMeta('filesize', $item->getSize());
        $backupFile->setMeta('datestamp', strtotime($item->getClientModified()));
        $backupFile->setFullName($item->getName());
        $backupFile->setMeta('metadata_loaded', TRUE);

        // Add backup file to array.
        $files[$item->getName()] = $backupFile;
      }

    } catch (DropboxClientException $e) {
      watchdog_exception('backup_migrate_drop_box - listFiles()', $e);
    }

    return $files;
  }

  /**
   * @inheritDoc
   */
  public function queryFiles(array $filters = [], $sort = 'datestamp', $sort_direction = SORT_DESC, $count = 100, $start = 0) {
    // Get the full list of files.
    $out = $this->listFiles($count + $start);
    foreach ($out as $key => $file) {
      $out[$key] = $this->loadFileMetadata($file);
    }
    // Filter the output.
    $out = array_reverse($out);
    // Slice the return array.
    if ($count || $start) {
      $out = array_slice($out, $start, $count);
    }
    return $out;
  }

  /**
   * @inheritDoc
   */
  public function countFiles() {
    $file_list = $this->listFiles();
    return count($file_list);
  }

  /**
   * @inheritDoc
   */
  public function getFile($id) {
    $files = $this->listFiles();
    if (isset($files[$id])) {
      return $files[$id];
    }
    return NULL;
  }

  /**
   * @inheritDoc
   */
  public function loadFileForReading(BackupFileInterface $file) {
    // If this file is already readable, simply return it.
    if ($file instanceof BackupFileReadableInterface) {
      return $file;
    }
    $id = $file->getMeta('id');
    $prefix = '/';
    try {
      $file = $this->getClient()->download($prefix . $id);
      return $file->getContents();
    } catch (DropboxClientException $e) {
      watchdog_exception('backup_migrate_drop_box - loadFileForReading()', $e);
    }
    return NULL;
  }

  /**
   * @inheritDoc
   */
  public function fileExists($id): bool {
    return (boolean) $this->getFile($id);
  }

  /**
   * Init configurations.
   *
   * @param array $params
   *
   * @return array
   */
  public function configSchema(array $params = []): array {
    $schema = [];

    // Init settings.
    if ($params['operation'] == 'initialize') {

      // Get available keys.
      $key_collection_url = Url::fromRoute('entity.key.collection')->toString();
      $keys = $this->keyRepository->getKeys();
      $key_options = [];
      foreach ($keys as $key_id => $key) {
        $key_options[$key_id] = $key->label();
      }

      // App key.
      $schema['fields']['dropbox_app_key_name'] = [
        'type' => 'enum',
        'title' => $this->t('App Key'),
        'description' => $this->t('App key to use Dropbox. Use keys managed by the key module. <a href=":keys">Manage keys</a>', [
          ':keys' => $key_collection_url,
        ]),
        'empty_option' => $this->t('- Select Key -'),
        'options' => $key_options,
        'required' => TRUE,
      ];

      // App secret.
      $schema['fields']['dropbox_app_secret_key_name'] = [
        'type' => 'enum',
        'title' => $this->t('App Secret'),
        'description' => $this->t('App Secret key to use Dropbox. Use keys managed by the key module. <a href=":keys">Manage keys</a>', [
          ':keys' => $key_collection_url,
        ]),
        'empty_option' => $this->t('- Select Key -'),
        'options' => $key_options,
        'required' => TRUE,
      ];

      // Access token.
      $schema['fields']['dropbox_access_token_key_name'] = [
        'type' => 'enum',
        'title' => $this->t('Access Token'),
        'description' => $this->t('Access token key to use Dropbox. Use keys managed by the key module. <a href=":keys">Manage keys</a>', [
          ':keys' => $key_collection_url,
        ]),
        'empty_option' => $this->t('- Select Key -'),
        'options' => $key_options,
        'required' => TRUE,
      ];

      // Folder prefix.
      $schema['fields']['dropbox_prefix'] = [
        'type' => 'text',
        'title' => $this->t('Sub-folder within Dropbox (optional)'),
        'required' => FALSE,
        'description' => $this->t('If you wish to organise your backups into a sub-folder such as /my/subfolder/, enter <i>my/subfolder</i> here without the leading or trailing slashes.'),
      ];
    }

    return $schema;
  }

}
