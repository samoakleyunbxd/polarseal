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
    $this->httpClient = \Drupal::httpClient(); //create http handler, not needed as we could just type \Drupal::httpclient() every time but it gets messy like this as we only want one client active at a time in case we ever get more requests 
  }

  public function fetch() {
    //make request
    $request = $this->httpClient->request('GET', 'https://Dokka:Nightmare!@test-priority.polarseal.net/odata/Priority/tabula.ini/test/ORDERS?$filter=CUSTNAME%20eq%20%27C-WHI1%27&$select=CUSTNAME,%20CDES,%20ORDNAME,%20DISPRICE,%20CODE,%20REFERENCE&$expand=ORDERITEMS_SUBFORM($select=KLINE,%20PARTNAME,%20PDES,TQUANT,%20TBALANCE;$expand=ORDSERIALORDI_SUBFORM($select=SERIALNAME,ZPLS_SERIALSTATUSDES,%20ZPLS_ACTNAME),ORDERITEMSIV_SUBFORM($select=IVNUM),ORDERITEMSTRANS_SUBFORM($select=CURDATE,%20DOC,KLINE,DOCNO,TTYPE,ZPLS_SHIPPERDES,ZPLS_AIRWAYBILL;$expand=ZPLS_SHIPTO_SUBFORM($select=ADDRESS,ADDRESS2,ADDRESS3,STATE,STATENAME,ZIP,COUNTRYNAME)))');
    //parse results
    $posts = $request->getBody()->getContents();
    echo "<pre>"; //display php in nice format if we need
    //turn to php and get the right part of object
    $arr = json_decode($posts)->value;
    foreach ($arr as $val) { //each order, find out if the order exists in drupal. If not, create, if it does scan for updates
      $query = \Drupal::entityQuery('node')
       ->condition('type', 'orders')
       ->condition('title', $val->ORDNAME);
       print_r($val);
       die();
       $nids = $query->execute();
      if (count($nids) > 0) {
        $this->updateOrder($nids,$val);
      } else {
        $this->createOrder($val);
      }

    }
  }
  protected function createOrder($val) { //new order
    $orderitemssubform = array();
    foreach ($val->ORDERITEMS_SUBFORM as $key=>$val) {
      $orderitemssubform[] = Paragraph::create([
        'type' => 'order_items_subform',
        'field_part_description' => array(
          'value'  =>  $drupalMedia->id(),
        )
      ]);
    }
    $imageparagraph = 
    $imageparagraph->save();
    $newOrder = Node::create(['type' => 'orders']); //create empty node object of type orders
    $newOrder->set('title', $val->ORDNAME); //assign field values
    $newOrder->set('field_currency_code', $val->CODE);
    $newOrder->set('field_customer_name_orders', $val->CUSTNAME);  
    $newOrder->set('field_customer_description_order', $val->CDES);
    $newOrder->set('field_order_name', $val->ORDNAME);  
   // $newOrder->set('field_dis_price_orders', $val->DISPRICE);       
    
    $newOrder->enforceIsNew();
    $newOrder->save(); //save
    return true;
  }
  protected function updateOrder($nids,$val) { //update order
    foreach ($nids as $nid) { //annoying thing you can't really bypass as the result of $nids has weird key values, we're only expecting this to run once
      $existOrder = Node::load($nid); //load the node we're updating
      $existOrder->field_dis_price_orders->value = $val->DISPRICE;  //update fields     
      $existOrder->save(); //save
    }
  }
}
