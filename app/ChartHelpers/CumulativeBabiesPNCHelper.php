<?php

namespace App\ChartHelpers;

use App\ChartHelpers\CumulativeChartHelper;

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
 * array ( 0 => array ( 'year' => 2017, 'month' => 11, 'PNC_count' => 599.0, ), 1 => array ( 'year' => 2017, 'month' => 12, 'PNC_count' => 53.0, ), 2 => array ( 'year' => 2018, 'month' => 1, 'PNC_count' => 79.0, ), )
 * array ( 0 => array ( 'year' => 2017, 'month' => 11, 'deliveries' => 9.0, ), 1 => array ( 'year' => 2017, 'month' => 12, 'deliveries' => 38.0, ), 2 => array ( 'year' => 2018, 'month' => 1, 'deliveries' => 29.0, ), )
 *
 */
class CumulativeBabiesPNCHelper {

	public $C3FormatData = array();

    function __construct($PNCVisitData, $deliveryData, $yLabel = NULL) {
      $this->C3FormatData = (new CumulativeChartHelper($PNCVisitData, $deliveryData, ['births', 'PNC_count'], $yLabel))->C3FormatData;
    }

}	
