<?php
namespace App\Indicators;

use App\Models\Traits\DwSubmissionZipArraysTrait;
use App\Models\Dwsubmissions\DwSubmissionHealthWorkers;
use App\Models\Dwsubmissions\DwSubmission015;

class DeliveriesPerMonth {

	public static function indicatorTotals() {
		return self::zipArrays(DwSubmission015::countCommunityDeliveryPerMonth(), DwSubmissionHealthWorkers::countHealthWorkerDeliveryPerMonth(), ['deliveries']);
	}
	public static function indicator15to19() {
		$res = self::zipArrays(DwSubmission015::count15to19CommunityDeliveryPerMonth()->toArray(), DwSubmissionHealthWorkers::count15to19HealthWorkerDeliveryPerMonth(), ['deliveries']);
		return $res;
	}
	public static function indicator20to49() {
		return self::zipArrays(DwSubmission015::count20to49CommunityDeliveryPerMonth()->toArray(), DwSubmissionHealthWorkers::count20to49HealthWorkerDeliveryPerMonth(), ['deliveries']);
	}

	use DwSubmissionZipArraysTrait;

}
