<?php

namespace Drupal\update_premium\Controller;

use Drupal\update_premium\UpdateManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Controller\ControllerBase;

/**
 * Controller routines for update routes.
 */
class UpdateController extends ControllerBase {

  /**
   * Update manager service.
   *
   * @var \Drupal\update_premium\UpdateManagerInterface
   */
  protected $updateManager;

  /**
   * Constructs update status data.
   *
   * @param \Drupal\update_premium\UpdateManagerInterface $update_manager
   *   Update Manager Service.
   */
  public function __construct(UpdateManagerInterface $update_manager) {
    $this->updateManager = $update_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('update_premium.manager')
    );
  }

  /**
   * Returns a page about the update status of projects.
   *
   * @return array
   *   A build array with the update status of projects.
   */
  public function updateStatus() {
    return [
      '#theme' => 'update_premium_report',
      '#projects' => $this->updateManager->checkUpdates(),
      '#attached' => [
        'library' => [
          'update/drupal.update.admin',
        ],
      ],
      '#cache' => [
        'tags' => ['update_premium_report'],
      ],
    ];
  }

  /**
   * Manually checks the update status without the use of cron.
   */
  public function updateStatusManually() {
    $projects = $this->updateManager->checkUpdates(TRUE);
    \Drupal::messenger()->addStatus(\Drupal::translation()->formatPlural(count($projects), 'Checked available update data for one project.', 'Checked available update data for @count projects.'));
    return $this->redirect('update_premium.manual_status');
  }

}
