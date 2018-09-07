<?php

namespace App\Models\Dwsubmissions;

use App\Models\Dwsubmissions\DwSubmission018;
use App\Models\Dwsubmissions\DwSubmission017;
use App\Models\Traits\DwSubmissionZipArraysTrait;

use Carbon\Carbon;

//This model contains the logic which merges the data from the two health worker questionnaires
class DwSubmissionHealthWorkers
{

	private static function excludedDataYearMonth() {
		//don't add the last month if we are under the 11th of the current month
		$weAreUnderThe11th = Carbon::now()->format('d') < 11;
		if($weAreUnderThe11th) {
			$excludedDataMonth = Carbon::now()->format('n')-1;
			if($excludedDataMonth == 0) {
				$excludedDataMonth = 12;
				$excludedDataYear = Carbon::now()->format('Y') - 1;
			} else {
				if($excludedDataMonth < 10) $excludedDataMonth = '0'.$excludedDataMonth;
				$excludedDataYear = Carbon::now()->format('Y');
			}
		} else {
			$excludedDataMonth = Carbon::now()->format('n');
			if($excludedDataMonth < 10) $excludedDataMonth = '0'.$excludedDataMonth;
			$excludedDataYear = Carbon::now()->format('Y');
		}
		return $excludedDataYear.$excludedDataMonth;
	}

	//for health worker data, data collected up to the 10th is for the previous month
	public static function daysToMonths($data, $dataKey) {
		$startOfMonth = 11;
		$dateKeyedData = array_reduce($data, function($dateKeyedData, $dayData) use ($startOfMonth, $dataKey) {
			if($dayData["day"] >= $startOfMonth) {
				$month = $dayData['month'];
				$year = $dayData['year'];
				if($month < 10) $month = '0'.$month;
				//don't add the last month if we are under the 10th of the current month
				if(($year.$month)+0 < self::excludedDataYearMonth()+0) {
					if(!isset($dateKeyedData[$year.$month])) $dateKeyedData[$year.$month]=0;
					$dateKeyedData[$year.$month] += $dayData[$dataKey];
				}
			} else if($dayData["day"] < $startOfMonth) {
				$month = $dayData['month'] - 1;
				$year = $dayData['year'];
				if($month == 0) {
					$month = 12;
					$year -= 1;
				}
				if($month < 10) $month = '0'.$month;
				//don't add the last month if we are under the 10th of the current month
				if(($year.$month)+0 < self::excludedDataYearMonth()+0) {
					if(!isset($dateKeyedData[$year.$month])) $dateKeyedData[$year.$month]=0;
					$dateKeyedData[$year.$month] += $dayData[$dataKey];
				}
			}
			return $dateKeyedData;
		}, []);
		$monthsData = [];
		foreach($dateKeyedData as $date=>$count) {
			$monthsData[] = ['year' => substr($date, 0, 4)+0, 'month' => substr($date, 4, 2)+0, $dataKey=>$count];
		}
		return $monthsData;
	}

	/*
	 * Childen receiving one or more vaccines per month
	 */
	//Returns the number of male babies 0-11 months old who have been vaccinated at least once 
	public static function countMaleVaccinated0to11() {
		return self::zipArrays(DwSubmission017::countMaleVaccinated0to11()->toArray(), DwSubmission018::countMaleVaccinated0to11()->toArray(), ['vaccinated']);
	}
	//Returns the number of male babies 12-23 months old who have been vaccinated at least once 
	public static function countMaleVaccinated12to23() {
		return self::zipArrays(DwSubmission017::countMaleVaccinated12to23()->toArray(), DwSubmission018::countMaleVaccinated12to23()->toArray(), ['vaccinated']);
	}
	//Returns the number of female babies 0-11 months old who have been vaccinated at least once 
	public static function countFemaleVaccinated0to11() {
		return self::zipArrays(DwSubmission017::countFemaleVaccinated0to11()->toArray(), DwSubmission018::countFemaleVaccinated0to11()->toArray(), ['vaccinated']);
	}
	//Returns the number of female babies 12-23 months old who have been vaccinated at least once 
	public static function countFemaleVaccinated12to23() {
		return self::zipArrays(DwSubmission017::countFemaleVaccinated12to23()->toArray(), DwSubmission018::countFemaleVaccinated12to23()->toArray(), ['vaccinated']);
	}

	/*
	 * Women receiving PNC per month
	 */

	//Returns the number of women who made a postnatal visit within 2 days of the birth in each month
	public static function countWithin2DaysPNCVisitsByMonth() {
		return self::traitZipArrays(self::count15to19Within2DaysPNCVisitsByMonth(), self::count20to49Within2DaysPNCVisitsByMonth(), ['PNC_count']);
	}
	//Returns the number of women ages 15-19 who made a postnatal visit within 2 days of the birth in each month
	public static function count15to19Within2DaysPNCVisitsByMonth() {
		return self::zipArrays(DwSubmission017::count15to19Within2DaysPNCVisitsByMonth()->toArray(), DwSubmission018::count15to19Within2DaysPNCVisitsByMonth()->toArray(), ['PNC_count']);
	}
	//Returns the number of women ages 20-49 who made a postnatal visit within 2 days of the birth in each month
	public static function count20to49Within2DaysPNCVisitsByMonth() {
		return self::zipArrays(DwSubmission017::count20to49Within2DaysPNCVisitsByMonth()->toArray(), DwSubmission018::count20to49Within2DaysPNCVisitsByMonth()->toArray(), ['PNC_count']);
	}

	/*
	 * Babies receiving PNC per month
	 */

	//Returns the number of babies who made a postnatal visit within 2 days of the birth in each month
	public static function countBabiesWithin2DaysPNCVisitsByMonth() {
		return self::traitZipArrays(self::countMaleBabiesWithin2DaysPNCVisitsByMonth(), self::countFemaleBabiesWithin2DaysPNCVisitsByMonth(), ['PNC_count']);
	}
	//Returns the male babies number who made a postnatal visit within 2 days of the birth in each month
	public static function countMaleBabiesWithin2DaysPNCVisitsByMonth() {
		return self::zipArrays(DwSubmission018::countMaleBabiesWithin2DaysPNCVisitsByMonth()->toArray(), DwSubmission017::countMaleBabiesWithin2DaysPNCVisitsByMonth()->toArray(), ['PNC_count']);
	}
	//Returns the number of female babies who made more than four postnatal visits in each month
	public static function countFemaleBabiesWithin2DaysPNCVisitsByMonth() {
		return self::zipArrays(DwSubmission018::countFemaleBabiesWithin2DaysPNCVisitsByMonth()->toArray(), DwSubmission017::countFemaleBabiesWithin2DaysPNCVisitsByMonth()->toArray(), ['PNC_count']);
	}

	/*
	 * Babies born per month
	 */

	//Returns the number of babies born (not just the number of deliveries) by month
	public static function countBabiesBornByMonth() {
		return self::traitZipArrays(self::countMaleBabiesBornByMonth(), self::countFemaleBabiesBornByMonth(), ['births']);
	}
	//Returns the male babies born by month 
	public static function countMaleBabiesBornByMonth() {
		return self::daysToMonths(DwSubmission018::countMaleBirthsByMonth()->toArray(), 'births');
	}
	//Returns the female babies born by month 
	public static function countFemaleBabiesBornByMonth() {
		return self::daysToMonths(DwSubmission018::countFemaleBirthsByMonth()->toArray(), 'births');
	}

	/*
	 * Receiving ANC per month
	 */

	//Returns the number of women who made more than four antenatal visits in each month
	public static function countGreaterThan4VisitsByMonth() {
		return self::traitZipArrays(self::count15to19GreaterThan4VisitsByMonth(), self::count20to49GreaterThan4VisitsByMonth(), ['ANC_count']);
	}
	//Returns the number of women ages 15-19 who made more than four antenatal visits in each month
	public static function count15to19GreaterThan4VisitsByMonth() {
		return self::zipArrays(DwSubmission017::count15to19GreaterThan4VisitsByMonth()->toArray(), DwSubmission018::count15to19GreaterThan4VisitsByMonth()->toArray(), ['ANC_count']);
	}
	//Returns the number of women ages 20-49 who made more than four antenatal visits in each month
	public static function count20to49GreaterThan4VisitsByMonth() {
		return self::zipArrays(DwSubmission017::count20to49GreaterThan4VisitsByMonth()->toArray(), DwSubmission018::count20to49GreaterThan4VisitsByMonth()->toArray(), ['ANC_count']);
	}

	/*
	 * Delivering per month 
	 */
	//Returns the number of women recorded by health workers who delivered per month 
	public static function countHealthWorkerDeliveryPerMonth() {
		return self::traitZipArrays(self::count15to19HealthWorkerDeliveryPerMonth(), self::count20to49HealthWorkerDeliveryPerMonth(), ['deliveries']);
	}
	//Returns the number of women ages 15-19 recorded by health workers who delivered per month 
	public static function count15to19HealthWorkerDeliveryPerMonth() {
		return self::zipArrays(DwSubmission017::count15to19HealthWorkerDeliveryPerMonth()->toArray(), DwSubmission018::count15to19HealthWorkerDeliveryPerMonth()->toArray(), ['deliveries']);
	}
	//Returns the number of women ages 20-49 recorded by health workers who delivered per month 
	public static function count20to49HealthWorkerDeliveryPerMonth() {
		return self::zipArrays(DwSubmission017::count20to49HealthWorkerDeliveryPerMonth()->toArray(), DwSubmission018::count20to49HealthWorkerDeliveryPerMonth()->toArray(), ['deliveries']);
	}

	/*
	 * Delivering per month - by skilled health worker 
	 */
	public static function countSkilledHealthWorkerDeliveryPerMonth() {
		return self::traitZipArrays(self::count15to19SkilledHealthWorkerDeliveryPerMonth(), self::count20to49SkilledHealthWorkerDeliveryPerMonth(), ['skilled_deliveries']);
	}
	//Returns the number of women ages 15-19 attended by a skilled health worker and recorded by health workers who delivered per month 
	public static function count15to19SkilledHealthWorkerDeliveryPerMonth() {
		return self::zipArrays(DwSubmission017::count15to19SkilledHealthWorkerDeliveryPerMonth()->toArray(), DwSubmission018::count15to19SkilledHealthWorkerDeliveryPerMonth()->toArray(), ['skilled_deliveries']);
	}
	//Returns the number of women ages 20-49 attended by a skilled health worker and recorded by health workers who delivered per month 
	public static function count20to49SkilledHealthWorkerDeliveryPerMonth() {
		return self::zipArrays(DwSubmission017::count20to49SkilledHealthWorkerDeliveryPerMonth()->toArray(), DwSubmission018::count20to49SkilledHealthWorkerDeliveryPerMonth()->toArray(), ['skilled_deliveries']);
	}

	use DwSubmissionZipArraysTrait {
        zipArrays as traitZipArrays;
    }

	private static function zipArrays($arr1, $arr2, $countKeys) {
		$arr1 = self::daysToMonths($arr1, $countKeys[0]);
		$arr2 = self::daysToMonths($arr2, $countKeys[0]);
        return self::traitZipArrays($arr1, $arr2, $countKeys);
    }

}
