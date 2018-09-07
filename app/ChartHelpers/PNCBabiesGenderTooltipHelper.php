<?php

namespace App\ChartHelpers;

use App\Models\Traits\DwSubmissionZipArraysTrait;

class PNCBabiesGenderTooltipHelper {

	public $boysGirlsArray = array();

    function __construct($piggyBackArray, $boysData, $girlsData, $startDateString, $endDateString) {
      $girlsData = array_map(function($data) {
		  $data['girls_PNC_count'] = $data['PNC_count'];
		  return $data;
      }, $girlsData);
      $boysData = array_map(function($data) {
		  $data['boys_PNC_count'] = $data['PNC_count'];
		  return $data;
      }, $boysData);
      $combinedData = self::zipArrays($girlsData, $boysData, ['boys_PNC_count', 'girls_PNC_count']);
	  //not quite right - we may need to fill in missing months, back fill with null and forward fill with null to match the numbers from the percentage
	  $this->boysGirlsArray = array_reduce(array_keys($combinedData), function($memo, $i) use ($startDateString, $endDateString, $combinedData, $piggyBackArray) {
		  $data = $combinedData[$i];
		  $month = $data['month']+0;
		  if($month < 10) $month = '0'.$month;
		  $monthComparator = ($data['year'].$month)+0;
		  if($monthComparator >= $startDateString+0 && $monthComparator <= $endDateString+0) { 
			$memo[0][] = $data['girls_PNC_count'];
			$memo[1][] = $data['boys_PNC_count'];
		  }
		  return $memo;
	  }, [['Girls'],['Boys']]);
    }

	use DwSubmissionZipArraysTrait; 

}	
