<?php

namespace Drupal\polar_seal\Controller;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\AppendCommand;
use Drupal\views\Controller\ViewAjaxController;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PolarSealViewAjaxController.
 */
class PolarSealViewAjaxController extends ViewAjaxController  {

  /**
   * Views_ajax.
   *
   * @return string
   *   Return Hello string.
   */
  public function ajaxView(Request $request) {
    $view_name = $request->get('view_id');
    $display_id = $request->get('display_id');
    $dom_id = "{$view_name}__{$display_id}";

    $request->request->set('view_name', $view_name);
    $request->request->set('view_display_id', $display_id);
    $request->request->set('view_args', $request->get('args'));
    $request->request->set('view_dom_id', $dom_id);

    return parent::ajaxView($request);
  }

}
