<?php

namespace Drupal\polar_seal\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the polar_seal module.
 */
class PolarSealViewAjaxControllerTest extends WebTestBase {


  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name' => "polar_seal PolarSealViewAjaxController's controller functionality",
      'description' => 'Test Unit for module polar_seal and controller PolarSealViewAjaxController.',
      'group' => 'Other',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests polar_seal functionality.
   */
  public function testPolarSealViewAjaxController() {
    // Check that the basic functions of module polar_seal.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via Drupal Console.');
  }

}
