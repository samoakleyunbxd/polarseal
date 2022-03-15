<?php

namespace Drupal\Tests\anonymous_login\Unit;

use Drupal\anonymous_login\EventSubscriber\AnonymousLoginSubscriber;
use Drupal\Tests\UnitTestCase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

/**
 * Tests the redirect logic.
 *
 * @group anonymous_login
 *
 * @coversDefaultClass \Drupal\anonymous_login\EventSubscriber\AnonymousLoginSubscriber
 */
class AnonymousLoginSubscriberTest extends UnitTestCase {

  /**
   * @covers ::redirect
   * @dataProvider getRedirectData
   */
  public function testRedirectLogic($request_uri, $redirect_uri, $alias = '') {
    $event = $this->callOnKernelRequestCheckRedirect($request_uri);
    // This is for requests that slipped redirect to the login page.
    if (!$event->hasResponse()) {
      $event->setResponse(new RedirectResponse($request_uri));
    }
    else {
      $alias = empty($alias) ? $request_uri : $alias;
      $redirect_uri = $redirect_uri . '?destination=' . substr($alias, 1);
    }
    $this->assertTrue($event->getResponse() instanceof RedirectResponse);
    $response = $event->getResponse();
    $this->assertEquals($redirect_uri, $response->getTargetUrl());
    $this->assertEquals(302, $response->getStatusCode());
  }

  /**
   * Data provider for test.
   */
  public function getRedirectData() {
    return [
      ['/user/login', '/user/login'],
      // For $paths['exclude'][] = 'user/reset/*'.
      ['/user/reset/*', '/user/reset/*'],
      // For $paths['exclude'][] = 'cron/*'.
      ['/cron/*', '/cron/*'],
      // For $paths['exclude'][] = 'sites/default/files/*'.
      ['/sites/default/files/*', '/sites/default/files/*'],
      // node/2 is in exclude array.
      ['/node/2', '/node/2', '/node-2-alias'],
      ['/node-2-alias', '/node-2-alias'],
      // Include array contains '*' and node/1, node/test is not in
      // exclude array.
      ['/node/1', '/user/login', '/node-1-alias'],
      ['/node-1-alias', '/user/login'],
      ['/node/test', '/user/login'],
    ];
  }

  /**
   * Instantiates the subscriber and runs redirect().
   *
   * @param string $request_uri
   *   The URI of the request.
   *
   * @return \Symfony\Component\HttpKernel\Event\GetResponseEvent
   *   THe response event.
   */
  protected function callOnKernelRequestCheckRedirect($request_uri) {
    $event = $this->getGetResponseEventStub($request_uri);
    $request = $event->getRequest();

    $state = $this->getMockBuilder('Drupal\Core\State\StateInterface')
      ->disableOriginalConstructor()
      ->getMock();
    $state->expects($this->any())
      ->method('get')
      ->with('system.maintenance_mode')
      ->will($this->returnValue(FALSE));

    $current_user = $this->getMockBuilder('Drupal\Core\Session\AccountProxyInterface')
      ->disableOriginalConstructor()
      ->getMock();
    $current_user->expects($this->any())
      ->method('isAnonymous')
      ->will($this->returnValue(TRUE));

    $alias_manager = $this->getMockBuilder('Drupal\path_alias\AliasManagerInterface')
      ->disableOriginalConstructor()
      ->getMock();
    $alias_manager->expects($this->any())
      ->method('getPathByAlias')
      ->with($this->anything())
      ->will($this->returnCallback(function ($alias) {
        switch ($alias) {
          case '/node-1-alias':
            $path = '/node/1';
            break;

          case '/node-2-alias':
            $path = '/node/2';
            break;

          default:
            $path = $alias;
        }

        return $path;
      }));
    $alias_manager->expects($this->any())
      ->method('getAliasByPath')
      ->with($this->anything())
      ->will($this->returnCallback(function ($path) {
        switch ($path) {
          case '/node/1':
            $alias = '/node-1-alias';
            break;

          case '/node/2':
            $alias = '/node-2-alias';
            break;

          default:
            $alias = $path;
        }

        return $alias;
      }));

    $paths = [
      'include' => ['*'],
      'exclude' => [
        'node/2',
        'user/reset/*',
        'cron/*',
        'sites/default/files/*',
      ],
    ];
    $path_matcher = $this->getMockBuilder('Drupal\Core\Path\PathMatcherInterface')
      ->disableOriginalConstructor()
      ->getMock();
    $path_matcher->expects($this->any())
      ->method('matchPath')
      ->with($this->anything(), $this->anything())
      ->will($this->returnCallback(function ($path, $patterns) {
          $to_replace = [
            '/(\r\n?|\n)/',
            '/\\\\\*/',
            '/(^|\|)\\\\<front\\\\>($|\|)/',
          ];
          $replacements = [
            '|',
            '.*',
            '\1' . preg_quote('<front>', '/') . '\2',
          ];
          $patterns_quoted = preg_quote($patterns, '/');
          $search = '/^(' . preg_replace($to_replace, $replacements, $patterns_quoted) . ')$/';

          return (bool) preg_match($search, $path);
      }));
    $module_handler = $this->getMockBuilder('Drupal\Core\Extension\ModuleHandlerInterface')
      ->disableOriginalConstructor()
      ->getMock();
    $module_handler->expects($this->any())
      ->method('alter')
      ->will($this->returnValue($paths));
    $path_validator = $this->getMockBuilder('Drupal\Core\Path\PathValidatorInterface')
      ->disableOriginalConstructor()
      ->getMock();
    $path_validator->expects($this->any())
      ->method('getUrlIfValidWithoutAccessCheck')
      ->will($this->returnValue(FALSE));
    $current_path = $this->getMockBuilder('Drupal\Core\Path\CurrentPathStack')
      ->disableOriginalConstructor()
      ->getMock();
    $current_path->expects($this->any())
      ->method('getPath')
      ->with($request)
      ->will($this->returnValue($request->getPathInfo()));

    $subscriber = new AnonymousLoginSubscriber(
      $this->getConfigFactoryStub(
        [
          'anonymous_login.settings' =>
          [
            'paths' => '*' . PHP_EOL . '~/node/2',
            'login_path' => '/user/login',
          ],
          'system.site' => ['page.front' => '<front>'],
        ]
      ),
      $state,
      $current_user,
      $path_matcher,
      $alias_manager,
      $module_handler,
      $path_validator,
      $current_path,
      FALSE
    );

    // Run the main redirect method.
    $subscriber->redirect($event);

    return $event;
  }

  /**
   * Gets response event object.
   *
   * @param string $request_uri
   *   The URI of the request.
   *
   * @return \Symfony\Component\HttpKernel\Event\GetResponseEvent
   *   The get response event object.
   */
  protected function getGetResponseEventStub($request_uri) {
    $request = Request::create($request_uri, 'GET', [], [], [], ['SCRIPT_NAME' => 'index.php']);

    $http_kernel = $this->getMockBuilder('\Symfony\Component\HttpKernel\HttpKernelInterface')
      ->getMock();
    return new GetResponseEvent($http_kernel, $request, 'test');
  }

}
