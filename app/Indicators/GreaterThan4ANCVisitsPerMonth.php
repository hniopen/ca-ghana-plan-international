<?php
namespace App\Indicators;

use App\Models\Dwsubmissions\DwSubmissionHealthWorkers;

class GreaterThan4ANCVisitsPerMonth {

	public static function indicatorTotals() {
		return DwSubmissionHealthWorkers::countGreaterThan4VisitsByMonth();
	}
	public static function indicator15to19() {
		return DwSubmissionHealthWorkers::count15to19GreaterThan4VisitsByMonth();
	}
	public static function indicator20to49() {
		return DwSubmissionHealthWorkers::count20to49GreaterThan4VisitsByMonth();
	}

}
