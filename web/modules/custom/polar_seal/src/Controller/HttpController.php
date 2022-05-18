<?php

namespace Drupal\polar_seal\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use GuzzleHttp\Client;
use Drupal\node\Entity\Node;
use Drupal\paragraphs\Entity\Paragraph;
use Drupal\Core\Datetime\DrupalDateTime;
use Drupal\datetime\Plugin\Field\FieldType\DateTimeItem;
use Drupal\datetime\Plugin\Field\FieldFormatter\DateTimeCustomFormatter;
use Drupal\datetime\Plugin\Field\FieldType\DateTimeItemInterface;
use Drupal\datetime_range\DateTimeRangeTrait;  
use Symfony\Component\HttpFoundation\JsonResponse;

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
   // $request = $this->httpClient->request('GET', 'https://Dokka:Nightmare!@test-priority.polarseal.net/odata/Priority/tabula.ini/test/ORDERS?$filter=CUSTNAME%20eq%20%27C-WHI1%27&$select=CUSTNAME,%20CDES,%20ORDNAME,%20DISPRICE,%20CODE,%20REFERENCE&$expand=ORDERITEMS_SUBFORM($select=KLINE,%20PARTNAME,%20PDES,TQUANT,%20TBALANCE;$expand=ORDSERIALORDI_SUBFORM($select=SERIALNAME,ZPLS_SERIALSTATUSDES,%20ZPLS_ACTNAME),ORDERITEMSIV_SUBFORM($select=IVNUM),ORDERITEMSTRANS_SUBFORM($select=CURDATE,%20DOC,KLINE,DOCNO,TTYPE,ZPLS_SHIPPERDES,ZPLS_AIRWAYBILL;$expand=ZPLS_SHIPTO_SUBFORM($select=ADDRESS,ADDRESS2,ADDRESS3,STATE,STATENAME,ZIP,COUNTRYNAME)))');
    $request = $this->httpClient->request('GET', 'https://Dokka:Nightmare!@test-priority.polarseal.net/odata/Priority/tabula.ini/test/ORDERS?$select=CUSTNAME,%20CDES,%20ORDNAME,%20DISPRICE,%20CODE,%20REFERENCE&$expand=ORDERITEMS_SUBFORM($select=KLINE,%20PARTNAME,%20PDES,TQUANT,%20TBALANCE;$expand=ORDSERIALORDI_SUBFORM($select=SERIALNAME,ZPLS_SERIALSTATUSDES,%20ZPLS_ACTNAME),ORDERITEMSIV_SUBFORM($select=IVNUM),ORDERITEMSTRANS_SUBFORM($select=CURDATE,%20DOC,KLINE,DOCNO,TTYPE,ZPLS_SHIPPERDES,ZPLS_AIRWAYBILL;$expand=ZPLS_SHIPTO_SUBFORM($select=ADDRESS,ADDRESS2,ADDRESS3,STATE,STATENAME,ZIP,COUNTRYNAME)))');
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
      $transarr = array();
      foreach ($obj->ORDERITEMSTRANS_SUBFORM as $val) {
        $address = $val->ZPLS_SHIPTO_SUBFORM->ADDRESS."\n".$val->ZPLS_SHIPTO_SUBFORM->ADDRESS2."\n".$val->ZPLS_SHIPTO_SUBFORM->ADDRESS3."\n".$obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPTO_SUBFORM->STATE."\n".$obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPTO_SUBFORM->STATENAME."\n".$val->ZPLS_SHIPTO_SUBFORM->ZIP."\n".$val->ZPLS_SHIPTO_SUBFORM->COUNTRYNAME;

        $transsubform = Paragraph::create([
          'type' => 'orderitemstrans_subform',
          'field_cur_date' => array(
            'value'  =>  $val->CURDATE,
          ),
          'field_doc' => array(
            'value'  =>  $val->DOC,
          ),
          'field_kline' => array(
            'value'  =>  $val->KLINE,
          ),
          'field_doc_no' => array(
            'value'  =>  $val->DOCNO,
          ),
          'field_t_type' => array(
            'value'  =>  $val->TTYPE,
          ),
          'field_zpls_shipperdes' => array(
            'value'  =>  $val->ZPLS_SHIPPERDES,
          ),
          'field_zpls_airwaybill' => array(
            'value'  =>  $val->ZPLS_AIRWAYBILL,
          ),
          'field_zpls_ship_to' => array(
            'value'  =>  $address
          ),
          
        ]);
        $transsubform->save();

         $transarr[] = array(
          'target_id' => $transsubform->id(),
          'target_revision_id' => $transsubform->getRevisionId(),
         );
      }
      $ivarr = array();
      foreach ($obj->ORDERITEMSIV_SUBFORM as $val) {
          $ivsubform = Paragraph::create([
          'type' => 'orderitemsiv_subform',
          'field_ivnum' => array(
            'value'  =>  $val->IVNUM,
          ),
        ]);
        $ivsubform->save();
        $ivarr[] = array(
          'target_id' => $ivsubform->id(),
          'target_revision_id' => $ivsubform->getRevisionId(),
        );
      }
      $serialarr = array();
      foreach ($obj->ORDSERIALORDI_SUBFORM as $val) {
        $serialsubform = Paragraph::create([
          'type' => 'ordserialordi_subform',
          'field_serial_name' => array(
            'value'  =>  $val->SERIALNAME,
          ),
          'field_zpls_actname' => array(
            'value'  =>  $val->ZPLS_ACTNAME,
          ),
          'field_zpls_serialstatusdes' => array(
            'value'  =>  $val->ZPLS_SERIALSTATUSDES,
          ),
        ]);
        $serialsubform->save();
        $serialarr[] = array(
          'target_id' => $serialsubform->id(),
          'target_revision_id' => $serialsubform->getRevisionId(),
        );
      }
      $orderpar = Paragraph::create([
        'type' => 'order_items_subform',
        'field_kline' => $obj->KLINE,
          'field_part_name'=> $obj->PARTNAME,
          'field_part_description' => $obj->PDES,
          'field_t_quant' => $obj->TQUANT,
          'field_t_balance' => $obj->TBALANCE,
        'field_orderitemstrans_subform' => $transarr,
        'field_orderitemsiv_subform' => $ivarr,
        'field_ordserialordi_subform' => $serialarr,
      ]);
      $orderpar->save();
      $orderitemssubform[] = $orderpar;
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
  protected function importUsers() {
    $row = 1;
    if (($handle = fopen("users.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $num = count($data);
            echo "<p> $num fields in line $row: <br /></p>\n";
            $row++;
            for ($c=0; $c < $num; $c++) {
                echo $data[$c] . "<br />\n";
            }
        }
        fclose($handle);
    }
  }
  function genSalesChart($from,$to) { //generate chart variables
    //typical date here is 01-2022 so parse accordingly
    //echo $to;
    $startdate = DrupalDateTime::createFromTimestamp(strtotime($from));
    $startdate->setTimezone(new \DateTimezone(\Drupal\datetime\Plugin\Field\FieldType\DateTimeItemInterface::STORAGE_TIMEZONE));
    $startformatted = $startdate->format(\Drupal\datetime\Plugin\Field\FieldType\DateTimeItemInterface::DATETIME_STORAGE_FORMAT);
    //bunch of drupal stuff to get right format
    $enddate = DrupalDateTime::createFromTimestamp(strtotime($to));
    $enddate->setTimezone(new \DateTimezone(\Drupal\datetime\Plugin\Field\FieldType\DateTimeItemInterface::STORAGE_TIMEZONE));
    $endformatted = $enddate->format(\Drupal\datetime\Plugin\Field\FieldType\DateTimeItemInterface::DATETIME_STORAGE_FORMAT);

    $query = \Drupal::entityQuery('node')
      ->condition('type', 'invoice')
      ->condition('field_invoice_date', $startformatted, '>=')
      ->condition('field_invoice_date', $endformatted, '<=')
      ->sort('field_invoice_date' , 'ASC'); 
    $results = $query->execute();
    $values = array();
    foreach ($results as $nid) {
      $node = Node::load($nid);
     // echo round($node->field_total_price->value,2);
     // echo "<br />";
      $values[date("m-Y",strtotime($node->field_invoice_date->value))] += $node->field_total_price->value;
    }
    foreach ($values as &$val) {
      $val = money_format('%(#10n',$val);
    }
    return new JsonResponse([ 'data' => $values, 'method' => 'GET', 'status'=> 200]);


  }
  protected function updateOrder($nids,$val) { //update order
    foreach ($nids as $key=>$nid) { //annoying thing you can't really bypass as the result of $nids has weird key values, we're only expecting this to run once
      $orderitemssubform = array();
      foreach ($val->ORDERITEMS_SUBFORM as $key=>$obj) {
        $transarr = array();
        foreach ($obj->ORDERITEMSTRANS_SUBFORM as $val) {
          $address = $val->ZPLS_SHIPTO_SUBFORM->ADDRESS."\n".$val->ZPLS_SHIPTO_SUBFORM->ADDRESS2."\n".$val->ZPLS_SHIPTO_SUBFORM->ADDRESS3."\n".$obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPTO_SUBFORM->STATE."\n".$obj->ORDERITEMSTRANS_SUBFORM[0]->ZPLS_SHIPTO_SUBFORM->STATENAME."\n".$val->ZPLS_SHIPTO_SUBFORM->ZIP."\n".$val->ZPLS_SHIPTO_SUBFORM->COUNTRYNAME;
  
          $transsubform = Paragraph::create([
            'type' => 'orderitemstrans_subform',
            'field_cur_date' => array(
              'value'  =>  $val->CURDATE,
            ),
            'field_doc' => array(
              'value'  =>  $val->DOC,
            ),
            'field_kline' => array(
              'value'  =>  $val->KLINE,
            ),
            'field_doc_no' => array(
              'value'  =>  $val->DOCNO,
            ),
            'field_t_type' => array(
              'value'  =>  $val->TTYPE,
            ),
            'field_zpls_shipperdes' => array(
              'value'  =>  $val->ZPLS_SHIPPERDES,
            ),
            'field_zpls_airwaybill' => array(
              'value'  =>  $val->ZPLS_AIRWAYBILL,
            ),
            'field_zpls_ship_to' => array(
              'value'  =>  $address
            ),
            
          ]);
          $transsubform->save();
  
           $transarr[] = array(
            'target_id' => $transsubform->id(),
            'target_revision_id' => $transsubform->getRevisionId(),
           );
        }
        $ivarr = array();
        foreach ($obj->ORDERITEMSIV_SUBFORM as $val) {
            $ivsubform = Paragraph::create([
            'type' => 'orderitemsiv_subform',
            'field_ivnum' => array(
              'value'  =>  $val->IVNUM,
            ),
          ]);
          $ivsubform->save();
          $ivarr[] = array(
            'target_id' => $ivsubform->id(),
            'target_revision_id' => $ivsubform->getRevisionId(),
          );
        }
        $serialarr = array();
        foreach ($obj->ORDSERIALORDI_SUBFORM as $val) {
          $serialsubform = Paragraph::create([
            'type' => 'ordserialordi_subform',
            'field_serial_name' => array(
              'value'  =>  $val->SERIALNAME,
            ),
            'field_zpls_actname' => array(
              'value'  =>  $val->ZPLS_ACTNAME,
            ),
            'field_zpls_serialstatusdes' => array(
              'value'  =>  $val->ZPLS_SERIALSTATUSDES,
            ),
          ]);
          $serialsubform->save();
          $serialarr[] = array(
            'target_id' => $serialsubform->id(),
            'target_revision_id' => $serialsubform->getRevisionId(),
          );
        }
        
        $orderpar = Paragraph::create([
          'type' => 'order_items_subform',
          'field_kline' => $obj->KLINE,
            'field_part_name'=> $obj->PARTNAME,
            'field_part_description' => $obj->PDES,
            'field_t_quant' => $obj->TQUANT,
            'field_t_balance' => $obj->TBALANCE,
          'field_orderitemstrans_subform' => $transarr,
          'field_orderitemsiv_subform' => $ivarr,
          'field_ordserialordi_subform' => $serialarr,
        ]);
        $orderpar->save();
        $orderitemssubform[] = $orderpar;
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
