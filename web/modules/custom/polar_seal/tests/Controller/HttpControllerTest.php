<?php

namespace Drupal\polar_seal\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the polar_seal module.
 */
class HttpControllerTest extends WebTestBase {


  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return [
      'name' => "polar_seal HttpController's controller functionality",
      'description' => 'Test Unit for module polar_seal and controller HttpController.',
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
  public function testHttpController() {
    // Check that the basic functions of module polar_seal.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via Drupal Console.');
  }

}
