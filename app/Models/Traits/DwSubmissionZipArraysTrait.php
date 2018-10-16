<?php

namespace App\Models\Traits;

trait DwSubmissionZipArraysTrait {
	//relies on array sorted by date which the query should guarantee
	private static function zipArrays($arr1, $arr2, $countKeys) {
		$comparisonMonth = function($month) {
			return $month < 10 ? "0".$month : $month;
		};
		$longestArray = $arr1 > $arr2 ? $arr1 : $arr2;
		$shortestArray = $arr1 > $arr2 ? $arr2 : $arr1;
		$combinedArray = [];
		$i = 0;
		foreach($longestArray as $key=>$monthData) {
			//add the short array months up to the current month of the long array to fill in gaps
			while(isset($shortestArray[$i]) && $shortestArray[$i]['year'].$comparisonMonth($shortestArray[$i]['month']) < $monthData['year'].$comparisonMonth($monthData['month'])) {
				$combinedArray[] = $shortestArray[$i];
				$i++;
			}
			//add the current long array month
			if(isset($shortestArray[$i]) && $shortestArray[$i]['year'].$comparisonMonth($shortestArray[$i]['month']) == $monthData['year'].$comparisonMonth($monthData['month'])) {
				foreach($countKeys as $countKey) {
					//if they are arrays of the same data
					if(isset($monthData[$countKey]) && isset($shortestArray[$i][$countKey])) {
						$monthData[$countKey] += $shortestArray[$i][$countKey];
					//no data for the longest array for this key - we are combining arrays of different kinds of data
					} else if(isset($shortestArray[$i][$countKey])) {
						$monthData[$countKey] = $shortestArray[$i][$countKey];
					//we already have it on the lonest array but not the shortest - do nothing
					} else if(isset($monthData[$countKey])) {
					//set to zero to make calculation easier
					} else {
						$monthData[$countKey] = 0;
					}
				}
				$i++;
			//the shortest array doesn't go that far - set the count key to 0
			} else {
				foreach($countKeys as $countKey) {
					if(!isset($monthData[$countKey])) {
						$monthData[$countKey] = 0;
					}
				}
			}
			$combinedArray[] = $monthData;
		}
		while(isset($shortestArray[$i])) {
			$combinedArray[] = $shortestArray[$i];
			$i++;
		}
		return $combinedArray;
	}
}
