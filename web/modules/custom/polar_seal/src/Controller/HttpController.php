<?php

namespace Drupal\polar_seal\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use GuzzleHttp\Client;
use Drupal\node\Entity\Node;
use Drupal\paragraphs\Entity\Paragraph;
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
       //print_r($val);
       $nids = $query->execute();
      if (count($nids) > 0) {
        // echo 1;
        // print_r($nids);
        $this->updateOrder($nids,$val);
      } else {
        $this->createOrder($val);
      }

    }
  }
  protected function createOrder($val) { //new order
    $orderitemssubform = array();
    foreach ($val->ORDERITEMS_SUBFORM as $key=>$obj) {
      $address = $obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPTO_SUBFORM->ADDRESS."\n".$obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPTO_SUBFORM->ADDRESS2."\n".$obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPTO_SUBFORM->ADDRESS3."\n".$obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPTO_SUBFORM->STATE."\n".$obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPTO_SUBFORM->STATENAME."\n".$obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPTO_SUBFORM->ZIP."\n".$obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPTO_SUBFORM->COUNTRYNAME;
      $transsubform = Paragraph::create([
        'type' => 'orderitemstrans_subform',
        'field_cur_date' => array(
          'value'  =>  $obj->ORDERITEMSTRANS_SUBFORM[0]->CURDATE,
        ),
        'field_doc' => array(
          'value'  =>  $obj->ORDERITEMSTRANS_SUBFORM[0]->DOC,
        ),
        'field_kline' => array(
          'value'  =>  $obj->ORDERITEMSTRANS_SUBFORM[0]->KLINE,
        ),
        'field_doc_no' => array(
          'value'  =>  $obj->ORDERITEMSTRANS_SUBFORM[0]->DOCNO,
        ),
        'field_t_type' => array(
          'value'  =>  $obj->ORDERITEMSTRANS_SUBFORM[0]->TTYPE,
        ),
        'field_zpls_shipperdes' => array(
          'value'  =>  $obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPPERDES,
        ),
        'field_zpls_airwaybill' => array(
          'value'  =>  $obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_AIRWAYBILL,
        ),
        'field_zpls_ship_to' => array(
          'value'  =>  $address
        ),
        
      ]);
      $ivsubform = Paragraph::create([
        'type' => 'ordserialordi_subform',
      ]);
      $ivsubform->save();
      $serialsubform = Paragraph::create([
        'type' => 'orderitemsiv_subform',
        'field_ivnum' => array(
          'value'  =>  $obj->ORDSERIALORDI_SUBFORM[0]->IVNUM,
        ),
      ]);
      $serialsubform->save();
      $orderitemssubform[] = Paragraph::create([
        'type' => 'order_items_subform',
        'field_kline' => $obj->KLINE,
          'field_part_name'=> $obj->PARTNAME,
          'field_part_description' => $obj->PDES,
          'field_t_quant' => $obj->TQUANT,
          'field_t_balance' => $obj->TBALANCE,
        'field_orderitemstrans_subform' => array(
          'target_id' => $transsubform->id(),
          'target_revision_id' => $transsubform->getRevisionId(),
        ),
        'field_orderitemsiv_subform' => array(
          'target_id' => $ivsubform->id(),
          'target_revision_id' => $ivsubform->getRevisionId(),
        ),
        'field_ordserialordi_subform' => array(
          'target_id' => $serialsubform->id(),
          'target_revision_id' => $serialsubform->getRevisionId(),
        )
      ]);
    }
   foreach ($orderitemssubform as $key=>$obj) {
    $pararr[] = array(
      'target_id' => $obj->id(),
      'target_revision_id' => $obj->getRevisionId(),
    );
   }
  //  $imageparagraph = 
  //  $imageparagraph->save();
    $newOrder = Node::create(['type' => 'orders']); //create empty node object of type orders
    $newOrder->set('title', $val->ORDNAME); //assign field values
    $newOrder->set('field_currency_code', $val->CODE);
    $newOrder->set('field_customer_name_orders', $val->CUSTNAME);  
    $newOrder->set('field_customer_description_order', $val->CDES);
    $newOrder->set('field_order_name', $val->ORDNAME);  
    $newOrder->set('field_dis_price_orders', $val->DISPRICE);       
    $newOrder->set('field_order_items_subform', $pararr);       

    $newOrder->enforceIsNew();
    $newOrder->save(); //save
    return true;
  }
  protected function updateOrder($nids,$val) { //update order
    foreach ($nids as $key=>$nid) { //annoying thing you can't really bypass as the result of $nids has weird key values, we're only expecting this to run once
      $orderitemssubform = array();
      foreach ($val->ORDERITEMS_SUBFORM as $key=>$obj) {
        $address = $obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPTO_SUBFORM->ADDRESS."\n".$obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPTO_SUBFORM->ADDRESS2."\n".$obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPTO_SUBFORM->ADDRESS3."\n".$obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPTO_SUBFORM->STATE."\n".$obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPTO_SUBFORM->STATENAME."\n".$obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPTO_SUBFORM->ZIP."\n".$obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPTO_SUBFORM->COUNTRYNAME;
        $transsubform = Paragraph::create([
          'type' => 'orderitemstrans_subform',
          'field_cur_date' => array(
            'value'  =>  $obj->ORDERITEMSTRANS_SUBFORM[0]->CURDATE,
          ),
          'field_doc' => array(
            'value'  =>  $obj->ORDERITEMSTRANS_SUBFORM[0]->DOC,
          ),
          'field_kline' => array(
            'value'  =>  $obj->ORDERITEMSTRANS_SUBFORM[0]->KLINE,
          ),
          'field_doc_no' => array(
            'value'  =>  $obj->ORDERITEMSTRANS_SUBFORM[0]->DOCNO,
          ),
          'field_t_type' => array(
            'value'  =>  $obj->ORDERITEMSTRANS_SUBFORM[0]->TTYPE,
          ),
          'field_zpls_shipperdes' => array(
            'value'  =>  $obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPPERDES,
          ),
          'field_zpls_airwaybill' => array(
            'value'  =>  $obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_AIRWAYBILL,
          ),
          'field_zpls_ship_to' => array(
            'value'  =>  $address
          ),
          
        ]);
        $transsubform->save();

        
        $serialsubform = Paragraph::create([
          'type' => 'ordserialordi_subform',
        ]);
        $ivsubform = Paragraph::create([
          'type' => 'orderitemsiv_subform',
          'field_ivnum' => array(
            'value'  =>  $obj->ORDSERIALORDI_SUBFORM[0]->IVNUM,
          ),
        ]);
        $ivsubform->save();

        $serialsubform->save();
        print_r($serialsubform);
        die();
        $par = Paragraph::create([
          'type' => 'order_items_subform',
          'field_kline' => $obj->KLINE,
          'field_part_name'=> $obj->PARTNAME,
          'field_part_description' => $obj->PDES,
          'field_t_quant' => $obj->TQUANT,
          'field_t_balance' => $obj->TBALANCE,
          'field_orderitemstrans_subform' => array(
            'target_id' => $transsubform->id(),
            'target_revision_id' => $transsubform->getRevisionId(),
          ),
          'field_orderitemsiv_subform' => array(
            'target_id' => $ivsubform->id(),
            'target_revision_id' => $ivsubform->getRevisionId(),
          ),
        /*  'field_ordserialordi_subform' => array(
            'target_id' => $serialsubform->id(),
            'target_revision_id' => $serialsubform->getRevisionId(),
          )*/
        ]);
        $par->save();
        $orderitemssubform[] = $par;
      }
   
      $pararr = array();
     foreach ($orderitemssubform as $key=>$obj) {
    
      $pararr[] = array(
        'target_id' => $obj->id(),
        'target_revision_id' => $obj->getRevisionId(),
      );
     }
      $existOrder = Node::load($nid); //load the node we're updating
     print_r($val);
      //print_r($pararr);
      $existOrder->set('field_currency_code', $val->CODE);
      $existOrder->set('field_customer_name_orders', $val->CUSTNAME);  
      $existOrder->set('field_customer_description_order', $val->CDES);
      $existOrder->set('field_order_name', $val->ORDNAME);  
      $existOrder->set('field_dis_price_orders', $val->DISPRICE);    
      $existOrder->set('field_order_items_subform', $pararr);       
      $existOrder->save(); //save

  
      //die();
    }
    return true;
  }
}
