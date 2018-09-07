<?php

namespace App\ChartHelpers;

use App\Models\Traits\DwSubmissionZipArraysTrait;
use App\ChartHelpers\Traits\GenericChartHelperTrait;

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
class CumulativeChartHelper {

	private $timeSeries = array();
	public $C3FormatData = array();
	private $zipKeys = array();
	private $yLabel = '';

    function __construct($numeratorData, $denominatorData, $zipKeys, $yLabel = NULL) {
      $this->yLabel = $yLabel;
      $this->zipKeys = $zipKeys;
      $cumulativeBasicData = $this->convertToCumlativeBasicData($numeratorData, $denominatorData);
      if($this->zipKeys[0]) {
		  $this->timeSeries = $this->convertToPercentageTimeseries($cumulativeBasicData);
	  } else {
		  $this->timeSeries = $this->convertToNumericTimeseries($cumulativeBasicData);
	  }
      $this->C3FormatData = $this->convertToC3FormatData($this->timeSeries);
    }

	private function convertToCumlativeBasicData($numeratorData, $denominatorData) {
		$zippedArrays = $denominatorData ? self::zipArrays($numeratorData, $denominatorData, $this->zipKeys) : $numeratorData;
		return array_reduce(array_keys($zippedArrays), function($cumulatingData, $i) use ($zippedArrays) {
			if(!$cumulatingData) {
				$cumulatingData[] = $zippedArrays[$i];
				return $cumulatingData;
			}
			$nextDataPeriod = [
				'month' => $zippedArrays[$i]['month'], 
				'year' => $zippedArrays[$i]['year'], 
				$this->zipKeys[1] => $zippedArrays[$i][$this->zipKeys[1]] + $cumulatingData[$i-1][$this->zipKeys[1]], 
			];
			if($this->zipKeys[0]) {
				$nextDataPeriod[$this->zipKeys[0]] = $zippedArrays[$i][$this->zipKeys[0]] + $cumulatingData[$i-1][$this->zipKeys[0]];
			}
			$cumulatingData[] = $nextDataPeriod;
			return $cumulatingData;
		}, []);
	}

	use DwSubmissionZipArraysTrait;
	use GenericChartHelperTrait;

}	
