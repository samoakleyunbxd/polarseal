<?php

namespace Drupal\polar_seal\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use GuzzleHttp\Client;
use Drupal\node\Entity\Node;

/**
 * Class HttpController.
 */
class HttpController extends ControllerBase {

  /**
   * Guzzle\Client instance.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  protected $httpClient;


  /**
   * {@inheritdoc}
   */
  public function __construct() {
    $this->httpClient = \Drupal::httpClient();
  }

  public function fetch() {
    $request = $this->httpClient->request('GET', 'https://Dokka:Nightmare!@test-priority.polarseal.net/odata/Priority/tabula.ini/test/ORDERS?$filter=CUSTNAME%20eq%20%27C-WHI1%27&$select=CUSTNAME,%20CDES,%20ORDNAME,%20DISPRICE,%20CODE,%20REFERENCE&$expand=ORDERITEMS_SUBFORM($select=KLINE,%20PARTNAME,%20PDES,TQUANT,%20TBALANCE;$expand=ORDSERIALORDI_SUBFORM($select=SERIALNAME,ZPLS_SERIALSTATUSDES,%20ZPLS_ACTNAME),ORDERITEMSIV_SUBFORM($select=IVNUM),ORDERITEMSTRANS_SUBFORM($select=CURDATE,%20DOC,KLINE,DOCNO,TTYPE,ZPLS_SHIPPERDES,ZPLS_AIRWAYBILL;$expand=ZPLS_SHIPTO_SUBFORM($select=ADDRESS,ADDRESS2,ADDRESS3,STATE,STATENAME,ZIP,COUNTRYNAME)))');
    $posts = $request->getBody()->getContents();
    echo "<pre>";
    $arr = json_decode($posts)->value;
    foreach ($arr as $val) {
      $query = \Drupal::entityQuery('node')
    ->condition('type', 'orders')
    ->condition('field_order_name', $val->ORDNAME);
  $nids = $query->execute();
  if (count($nids) > 0) {
    $this->updateOrder($nids,$arr);
  } else {
    $this->createOrder($arr);
  }

    }
  }
  protected function createOrder($arr) {
    print_r($arr); 
    die();
    // $newVideo = Node::create(['type' => 'video']);
    // $newVideo->set('title', $vid['title']);
    // $newVideo->set('body', $vid['description']);
    // $newVideo->set('field_video_id', $vid['id']);
    // $newVideo->set('field_thumbnail', $vid['thumbnail_url']);  
    // $newVideo->set('field_published_at', $vid['created_time']);       
    // $newVideo->enforceIsNew();
    // $newVideo->save();
    // return true;
  }
  protected function updateOrder($nids,$arr) {
    $nodes = \Drupal\node\Entity\Node::loadMultiple($nids);

    $node = $nodes[0];
    print_r($node);
  
  }
}
