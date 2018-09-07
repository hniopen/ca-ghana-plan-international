<?php

namespace App\ChartHelpers\Traits;

trait GenericChartHelperTrait {
	private function convertToPercentageTimeseries($zippedArrays) {
		$comparisonMonth = function($month) {
			return $month < 9 ? "0".$month : $month;
		};
		return array_map(function($month) use ($comparisonMonth) {
			if(isset($month[$this->zipKeys[0]]) && $month[$this->zipKeys[0]] > 0 && isset($month[$this->zipKeys[1]]) && $month[$this->zipKeys[1]] > 0) {
				return ['month' => $month['year'].$comparisonMonth($month['month']), "percent" => (round(100 * ($month[$this->zipKeys[1]] / $month[$this->zipKeys[0]])))];
			} else {
				if(!isset($month[$this->zipKeys[0]]) || $month[$this->zipKeys[0]] == 0) {
					return ['month' => $month['year'].$comparisonMonth($month['month']), "percent" => null];
				} else {
					return ['month' => $month['year'].$comparisonMonth($month['month']), "percent" => 0];
				}
			}
		}, $zippedArrays);
	}
	private function convertToNumericTimeseries($zippedArrays) {
		$comparisonMonth = function($month) {
			return $month < 9 ? "0".$month : $month;
		};
		return array_map(function($month) use ($comparisonMonth) {
			if(isset($month[$this->zipKeys[1]]) && $month[$this->zipKeys[1]] > 0) {
				return ['month' => $month['year'].$comparisonMonth($month['month']), "percent" => $month[$this->zipKeys[1]]];
			} else {
				return ['month' => $month['year'].$comparisonMonth($month['month']), "percent" => 0];
			}
		}, $zippedArrays);
	}
	private function convertToC3FormatData($timeSeries) {
		$C3Data = [
			['x'],
			[($this->yLabel ? $this->yLabel : 'Percent %')]
		];
		foreach($timeSeries as $month) {
			$C3Data[0][] = $month['month'];
			$C3Data[1][] = $month['percent'];
		}
		return $C3Data;
	}

}
