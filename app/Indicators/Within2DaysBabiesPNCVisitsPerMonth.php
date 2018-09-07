<?php
namespace App\Indicators;

use App\Models\Dwsubmissions\DwSubmissionHealthWorkers;

class Within2DaysBabiesPNCVisitsPerMonth {

	public static function indicatorTotals() {
		return DwSubmissionHealthWorkers::countBabiesWithin2DaysPNCVisitsByMonth();
	}
	public static function indicatorMaleBabies() {
		return DwSubmissionHealthWorkers::countMaleBabiesWithin2DaysPNCVisitsByMonth();
	}
	public static function indicatorFemaleBabies() {
		return DwSubmissionHealthWorkers::countFemaleBabiesWithin2DaysPNCVisitsByMonth();
	}

}
