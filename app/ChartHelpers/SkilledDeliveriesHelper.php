<?php

namespace App\ChartHelpers;

use App\ChartHelpers\GenericChartHelper;

/*
 * Converts data from DB into data for C3.js
 *
 * Output format (C3)
 *array (
 *  0 => 
 *  array (0 => 'x',1 => '2013-02',2 => '2013-03',3 => '2013-04',4 => '2013-05',5 => '2013-06',6 => '2013-07',),
 *  1 => 
 *  array (0 => 'Percentage of deliveries with more than 4+ ANC visits',1 => 2%,2 => 40%,3 => 45%,4 => 55%,5 => 62%,6 => 87%,),
 *)
 * 
 * Input format
 * array ( 0 => array ( 'year' => 2017, 'month' => 11, 'ANC_count' => 599.0, ), 1 => array ( 'year' => 2017, 'month' => 12, 'ANC_count' => 53.0, ), 2 => array ( 'year' => 2018, 'month' => 1, 'ANC_count' => 79.0, ), )
 * array ( 0 => array ( 'year' => 2017, 'month' => 11, 'deliveries' => 9.0, ), 1 => array ( 'year' => 2017, 'month' => 12, 'deliveries' => 38.0, ), 2 => array ( 'year' => 2018, 'month' => 1, 'deliveries' => 29.0, ), )
 *
 */
class SkilledDeliveriesHelper {

	public $C3FormatData = array();

    function __construct($skilledDeliveriesData, $deliveryData, $yLabel = NULL) {
      $this->C3FormatData = (new GenericChartHelper($skilledDeliveriesData, $deliveryData, ['deliveries', 'skilled_deliveries'], $yLabel))->C3FormatData;
    }

}	
