<?php
namespace App\Indicators;

use App\Models\Dwsubmissions\DwSubmissionHealthWorkers;

class BabiesBornPerMonth {

	public static function indicatorTotals() {
		return DwSubmissionHealthWorkers::countBabiesBornByMonth();
	}
	public static function indicatorMaleBabies() {
		return DwSubmissionHealthWorkers::countMaleBabiesBornByMonth();
	}
	public static function indicatorFemaleBabies() {
		return DwSubmissionHealthWorkers::countFemaleBabiesBornByMonth();
	}

}
