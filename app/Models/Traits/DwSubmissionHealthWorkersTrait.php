<?php

namespace App\Models\Traits;

use DB;
use App\Models\Traits\DwSubmissionGenericQueryTraits;

use Carbon\Carbon;

trait DwSubmissionHealthWorkersTrait {
	use DwSubmissionGenericQueryTraits;

	private static function applyTimePeriodWhere($query) {
		return $query->whereRaw(
			"status != 'deleted'
			 AND STR_TO_DATE(date,'%d.%m.%Y') >= STR_TO_DATE('11.11.2017','%d.%m.%Y')
			 AND STR_TO_DATE(date,'%d.%m.%Y') < STR_TO_DATE('11.".Carbon::now()->format('m.Y')."','%d.%m.%Y')");
	}

	private static $groupBy = "YEAR(STR_TO_DATE(date,'%d.%m.%Y')), MONTH(STR_TO_DATE(date,'%d.%m.%Y')), DAY(STR_TO_DATE(date,'%d.%m.%Y'))";
	private static $dateSelect = "YEAR(STR_TO_DATE(date,'%d.%m.%Y')) as year, MONTH(STR_TO_DATE(date,'%d.%m.%Y')) as month, DAY(STR_TO_DATE(date,'%d.%m.%Y')) as day";
	private static function pncVisitsSelectStrings15To19() {
		return array_merge([
			self::$dateSelect,
			"SUM(IFNULL(pnc__mother__age15_19_pnc__pnc1_1,0))+SUM(IFNULL(pnc__mother__age15_19_pnc__pnc2_1,0)) as PNC_count"
		]);
	}
	private static function pncVisitsSelectStrings20To49() {
		return array_merge([
			self::$dateSelect,
			"SUM(IFNULL(pnc__mother__age20_49_pnc__pnc1_2,0))+SUM(IFNULL(pnc__mother__age20_49_pnc__pnc2_2,0)) as PNC_count"
		]);
	}
	private static function ancVisitsSelectStrings15To19() {
		return array_merge([
			self::$dateSelect,
			"SUM(IFNULL(antenatal__age15_19_ant__anc4th_1,0))+
			 SUM(IFNULL(antenatal__age15_19_ant__anc5th_1,0))+
			 SUM(IFNULL(antenatal__age15_19_ant__anc6th_1,0))+
			 SUM(IFNULL(antenatal__age15_19_ant__anc7th_1,0))+
			 SUM(IFNULL(antenatal__age15_19_ant__anc8th_1,0))+
			 SUM(IFNULL(antenatal__age15_19_ant__anc9th_1,0))
		   	as ANC_count"
		]);
	}
	private static function ancVisitsSelectStrings20To49() {
		return array_merge([
			self::$dateSelect,
			"SUM(IFNULL(antenatal__age20_49_ant__anc4th_2,0))+
			 SUM(IFNULL(antenatal__age20_49_ant__anc5th_2,0))+
			 SUM(IFNULL(antenatal__age20_49_ant__anc6th_2,0))+
			 SUM(IFNULL(antenatal__age20_49_ant__anc7th_2,0))+
			 SUM(IFNULL(antenatal__age20_49_ant__anc8th_2,0))+
			 SUM(IFNULL(antenatal__age20_49_ant__anc9th_2,0))
		   	ANC_count"
		]);
	}
	private static function maleVaccinated0to11SelectStrings() {
		return array_merge([
			self::$dateSelect,
			"SUM(measles__age1_11__boys1_11__age1_11b_1) as vaccinated"
		]);
	}
	private static function maleVaccinated12to23SelectStrings() {
		return array_merge([
			self::$dateSelect,
			"SUM(measles__age12_23__boys12_23__age12_23b) as vaccinated"
		]);
	}
	private static function femaleVaccinated0to11SelectStrings() {
		return array_merge([
			self::$dateSelect,
			"SUM(measles__age1_11__girls1_11__age1_11g_1) as vaccinated"
		]);
	}
	private static function femaleVaccinated12to23SelectStrings() {
		return array_merge([
			self::$dateSelect,
			"SUM(measles__age12_23__girls12_23__age12_23g) as vaccinated"
		]);
	}
		
	/*
	 * Receiving PNC per month
	 */

	//Returns the number of women ages 15-19 who made a postnatal visit within 2 days of the birth in each month
	public static function count15to19Within2DaysPNCVisitsByMonth() {
		$query = self::select(array_map("DB::raw", self::pncVisitsSelectStrings15To19()))
            ->groupBy(DB::raw(self::$groupBy))   
            ->orderBy(DB::raw(self::orderBy())); 
		$query = self::applyTimePeriodWhere($query);
		$query = self::applyThisQuestionnaireTimePeriodWhere($query);
		return $query->get();
	}
	//Returns the number of women ages 20-49 who made a postnatal visit within 2 days of the birth in each month
	public static function count20to49Within2DaysPNCVisitsByMonth() {
		$query = self::select(array_map('DB::raw', self::pncVisitsSelectStrings20To49()))
            ->groupBy(DB::raw(self::$groupBy))   
            ->orderBy(DB::raw(self::orderBy())); 
		$query = self::applyTimePeriodWhere($query);
		$query = self::applyThisQuestionnaireTimePeriodWhere($query);
		return $query->get();
	}
	/*
	 * Receiving ANC per month
	 */

	//Returns the number of women ages 15-19 who made more than four antenatal visits in each month
	public static function count15to19GreaterThan4VisitsByMonth() {
		$query = self::select(array_map("DB::raw", self::ancVisitsSelectStrings15To19()))
            ->groupBy(DB::raw(self::$groupBy))   
            ->orderBy(DB::raw(self::orderBy())); 
		$query = self::applyTimePeriodWhere($query);
		$query = self::applyThisQuestionnaireTimePeriodWhere($query);
		return $query->get();
	}
	//Returns the number of women ages 20-49 who made more than four antenatal visits in each month
	public static function count20to49GreaterThan4VisitsByMonth() {
		$query = self::select(array_map('DB::raw', self::ancVisitsSelectStrings20To49()))
            ->groupBy(DB::raw(self::$groupBy))   
            ->orderBy(DB::raw(self::orderBy())); 
		$query = self::applyTimePeriodWhere($query);
		$query = self::applyThisQuestionnaireTimePeriodWhere($query);
		return $query->get();
	}

	private static function count15to19HealthWorkerDeliveryPerMonthQuery($asWhat) {
		$query = self::select(array_map('DB::raw', self::deliveriesSelectStrings15To19($asWhat)))
            ->groupBy(DB::raw(self::$groupBy))   
            ->orderBy(DB::raw(self::orderBy()))   ;
		$query = self::applyTimePeriodWhere($query);
		$query = self::applyThisQuestionnaireTimePeriodWhere($query);
		return $query;
	}
	private static function count20to49HealthWorkerDeliveryPerMonthQuery($asWhat) {
		$query = self::select(array_map('DB::raw', self::deliveriesSelectStrings20To49($asWhat)))
            ->groupBy(DB::raw(self::$groupBy))   
            ->orderBy(DB::raw(self::orderBy())); 
		$query = self::applyTimePeriodWhere($query);
		$query = self::applyThisQuestionnaireTimePeriodWhere($query);
		return $query;
	}
	/*
	 * Delivering per month health worker
	 */
	//Returns the number of women ages 15-19 recorded by health workers who delivered per month 
	public static function count15to19HealthWorkerDeliveryPerMonth() {
		$asWhat = 'deliveries';
		$query = self::count15to19HealthWorkerDeliveryPerMonthQuery($asWhat);
        $query = self::applyDeliveriesWhere($query);
        return $query->get();
	}
	//Returns the number of women ages 20-49 recorded by health workers who delivered per month 
	public static function count20to49HealthWorkerDeliveryPerMonth() {
		$asWhat = 'deliveries';
		$query = self::count20to49HealthWorkerDeliveryPerMonthQuery($asWhat);
        return self::applyDeliveriesWhere($query)->get();
	}
	/*
	 * skilled delivering per month health worker
	 */
	//Returns the number of women ages 15-19 attended by a skilled health worker and recorded by health workers who delivered per month 
	public static function count15to19SkilledHealthWorkerDeliveryPerMonth() {
		$asWhat = 'skilled_deliveries';
		$query = self::count15to19HealthWorkerDeliveryPerMonthQuery($asWhat);
		return self::applySkilledHealthWorkerDeliveriesWhere($query)->get();
	}
	//Returns the number of women ages 20-49 attended by a skilled health worker and recorded by health workers who delivered per month 
	public static function count20to49SkilledHealthWorkerDeliveryPerMonth() {
		$asWhat = 'skilled_deliveries';
		$query = self::count20to49HealthWorkerDeliveryPerMonthQuery($asWhat);
		return self::applySkilledHealthWorkerDeliveriesWhere($query)->get();
	}

	/*
	 * Childen receiving one or more vaccines per month
	 */
	//Returns the number of male babies 0-11 months old who have been vaccinated at least once 
	public static function countMaleVaccinated0to11() {
		$query = self::select(array_map('DB::raw', self::maleVaccinated0to11SelectStrings()))
            ->groupBy(DB::raw(self::$groupBy))   
            ->orderBy(DB::raw(self::orderBy()))   ;
		$query = self::applyTimePeriodWhere($query);
		$query = self::applyThisQuestionnaireTimePeriodWhere($query);
		return $query->get();
	}
	//Returns the number of male babies 12-23 months old who have been vaccinated at least once 
	public static function countMaleVaccinated12to23() {
		$query = self::select(array_map('DB::raw', self::maleVaccinated12to23SelectStrings()))
            ->groupBy(DB::raw(self::$groupBy))   
            ->orderBy(DB::raw(self::orderBy()))   ;
		$query = self::applyTimePeriodWhere($query);
		$query = self::applyThisQuestionnaireTimePeriodWhere($query);
		return $query->get();
	}
	//Returns the number of female babies 0-11 months old who have been vaccinated at least once 
	public static function countFemaleVaccinated0to11() {
		$query = self::select(array_map('DB::raw', self::femaleVaccinated0to11SelectStrings()))
            ->groupBy(DB::raw(self::$groupBy))   
            ->orderBy(DB::raw(self::orderBy()))   ;
		$query = self::applyTimePeriodWhere($query);
		$query = self::applyThisQuestionnaireTimePeriodWhere($query);
		return $query->get();
	}
	//Returns the number of female babies 12-23 months old who have been vaccinated at least once 
	public static function countFemaleVaccinated12to23() {
		$query = self::select(array_map('DB::raw', self::femaleVaccinated12to23SelectStrings()))
            ->groupBy(DB::raw(self::$groupBy))   
            ->orderBy(DB::raw(self::orderBy()))   ;
		$query = self::applyTimePeriodWhere($query);
		$query = self::applyThisQuestionnaireTimePeriodWhere($query);
		return $query->get();
	}

	//Returns the number of male babies who made a postnatal visit within 2 days of the birth in each month
	private static function pncVisitsSelectStringsMaleBabies() {
		return array_merge([
			self::$dateSelect,
			"SUM(IFNULL(pnc__babies__gender_boys__pnc1_b,0))+SUM(IFNULL(pnc__babies__gender_boys__pnc2_b,0)) as PNC_count"
		]);
	}
	private static function pncVisitsSelectStringsFemaleBabies() {
		return array_merge([
			self::$dateSelect,
			"SUM(IFNULL(pnc__babies__gender_girls__pnc1_g,0))+SUM(IFNULL(pnc__babies__gender_girls__pnc2_g,0)) as PNC_count"
		]);
	}
	public static function countMaleBabiesWithin2DaysPNCVisitsByMonth() {
		$query = self::select(array_map("DB::raw", self::pncVisitsSelectStringsMaleBabies()))
            ->groupBy(DB::raw(self::$groupBy))   
            ->orderBy(DB::raw(self::orderBy())); 
		$query = self::applyTimePeriodWhere($query);
		$query = self::applyThisQuestionnaireTimePeriodWhere($query);
		return $query->get();
	}
	//Returns the number of female babies who made a postnatal visit within 2 days of the birth in each month
	public static function countFemaleBabiesWithin2DaysPNCVisitsByMonth() {
		$query = self::select(array_map('DB::raw', self::pncVisitsSelectStringsFemaleBabies()))
            ->groupBy(DB::raw(self::$groupBy))   
            ->orderBy(DB::raw(self::orderBy())); 
		$query = self::applyTimePeriodWhere($query);
		$query = self::applyThisQuestionnaireTimePeriodWhere($query);
		return $query->get();
	}
}
