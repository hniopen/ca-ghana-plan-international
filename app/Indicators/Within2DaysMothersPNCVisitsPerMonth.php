<?php
namespace App\Indicators;

use App\Models\Dwsubmissions\DwSubmissionHealthWorkers;

class Within2DaysMothersPNCVisitsPerMonth {

	public static function indicatorTotals() {
		return DwSubmissionHealthWorkers::countWithin2DaysPNCVisitsByMonth();
	}
	public static function indicator15to19() {
		return DwSubmissionHealthWorkers::count15to19Within2DaysPNCVisitsByMonth();
	}
	public static function indicator20to49() {
		return DwSubmissionHealthWorkers::count20to49Within2DaysPNCVisitsByMonth();
	}

}
