<?php

namespace Drupal\marcin_first_machine\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the marcin_first_machine module.
 */
class DefaultControllerTest extends WebTestBase {


  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name' => "marcin_first_machine DefaultController's controller functionality",
      'description' => 'Test Unit for module marcin_first_machine and controller DefaultController.',
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
   * Tests marcin_first_machine functionality.
   */
  public function testDefaultController() {
    // Check that the basic functions of module marcin_first_machine.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via Drupal Console.');
  }

}
