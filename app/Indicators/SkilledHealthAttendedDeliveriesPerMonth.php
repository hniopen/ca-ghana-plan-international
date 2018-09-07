<?php
namespace App\Indicators;

use App\Models\Dwsubmissions\DwSubmissionHealthWorkers;

class SkilledHealthAttendedDeliveriesPerMonth {

	public static function indicatorTotals() {
		return DwSubmissionHealthWorkers::countSkilledHealthWorkerDeliveryPerMonth();
	}
	public static function indicator15to19() {
		return DwSubmissionHealthWorkers::count15to19SkilledHealthWorkerDeliveryPerMonth();
	}
	public static function indicator20to49() {
		return DwSubmissionHealthWorkers::count20to49SkilledHealthWorkerDeliveryPerMonth();
	}

}
