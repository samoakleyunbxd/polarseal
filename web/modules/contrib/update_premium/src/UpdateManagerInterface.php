<?php

namespace Drupal\update_premium;

/**
 * Manages project update information.
 */
interface UpdateManagerInterface {

  /**
   * Get all premium modules and themes.
   */
  public function getProjects();

  /**
   * Check premium modules and themes for updates (cached).
   */
  public function checkUpdates($manual);

  /**
   * Check premium modules and themes for updates.
   */
  public function processUpdates(&$projects);

  /**
   * Fetch premium module or theme data.
   */
  public function fetchProject($url);

  /**
   * Get project info yaml contents as array.
   */
  public function getYamlInfo($name);

}
