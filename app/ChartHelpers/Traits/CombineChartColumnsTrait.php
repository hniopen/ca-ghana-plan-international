<?php

namespace App\ChartHelpers\Traits;

trait CombineChartColumnsTrait {
	/*
	 *
	 * Currently this only supports combining 2 column sets each consisting of one date column and one data column only.
	 * $columnSetOne = [
	 *	['x', '201712', '201801'],
	 *	["title1", 0, 99]
	 * ]
	 * $columnSetTwo = [
	 *	['x', '201712', '201802'],
	 *	["title2", 3, 101]
	 * ]
	 *
	 * Becomes
	 * $combined = [
	 *	['x', '201712', '201801', '201802'],
	 *	["title1", 0, 99, 0]
	 *	["title1", 3, 0, 101]
	 * ]
	 */
	private static function combineChartColumns($columnSetOne, $columnSetTwo) {
		$dateKeyedData = [];
		foreach($columnSetOne[0] as $dateOffset=>$date) {
			foreach(array_slice($columnSetTwo, 1) as $i=>$col) {
				$dateKeyedData[$date] = ['col2'.$i => null];
			}
			foreach(array_slice($columnSetOne, 1) as $i=>$col) {
				$dateKeyedData[$date]['col1'.$i] = $columnSetOne[$i+1][$dateOffset];
			}
		}
		foreach($columnSetTwo[0] as $dateOffset=>$date) {
			if(!isset($dateKeyedData[$date])) {
				$dateKeyedData[$date] = [];
			}
			foreach(array_slice($columnSetOne, 1) as $i=>$col) {
				if(!isset($dateKeyedData[$date]['col1'.$i])) {
					$dateKeyedData[$date]['col1'.$i] = null;
				}
			}
			foreach(array_slice($columnSetTwo, 1) as $i=>$col) {
				$dateKeyedData[$date]['col2'.$i] = $columnSetTwo[$i+1][$dateOffset];
			}
		}
		$columnTitles = $dateKeyedData['x'];
		unset($dateKeyedData['x']);
		ksort($dateKeyedData);

		//add date column title
		$dataWithAllDates = [
			['x'],
		];
		//add column titles
		foreach(array_slice($columnSetOne, 1) as $i=>$col) {
			$dataWithAllDates[] = [$col[0]];
		}
		foreach(array_slice($columnSetTwo, 1) as $i=>$col) {
			$dataWithAllDates[] = [$col[0]];
		}
		// add data into columns
		foreach($dateKeyedData as $date=>$cols) {
			//add date
			$dataWithAllDates[0][] = $date.'';
			$lastOffset = 1;
			//add data
			foreach(array_slice($columnSetOne, 1) as $i=>$col) {
				$dataWithAllDates[$i+1][] = $cols['col1'.$i];
				$lastOffset = $i+1;
			}
			foreach(array_slice($columnSetTwo, 1) as $i=>$col) {
				$dataWithAllDates[$lastOffset+$i+1][] = $cols['col2'.$i];
			}
		}

		return $dataWithAllDates;
	}
}
