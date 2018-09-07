<?php
namespace App\Indicators;

use App\Models\Dwsubmissions\DwSubmissionHealthWorkers;
use App\Models\Traits\DwSubmissionZipArraysTrait;
use App\Models\Dwsubmissions\DwSubmission015;

class OneOrMoreVaccinations {

	public static function indicatorTotals() {
		return self::zipArrays(self::indicatorMaleTotals(), self::indicatorFemaleTotals(), ['vaccinated']);
	}
	public static function indicatorMaleTotals() {
		return self::zipArrays(self::indicatorMale0to11(), self::indicatorMale12to23(), ['vaccinated']);
	}
	public static function indicatorFemaleTotals() {
		return self::zipArrays(self::indicatorFemale0to11(), self::indicatorFemale12to23(), ['vaccinated']);
	}
	public static function indicator0to11Totals() {
		return self::zipArrays(self::indicatorMale0to11(), self::indicatorFemale0to11(), ['vaccinated']);
	}
	public static function indicator12to23Totals() {
		return self::zipArrays(self::indicatorMale12to23(), self::indicatorFemale12to23(), ['vaccinated']);
	}
	public static function indicatorMale0to11() {
		return self::zipArrays(DwSubmissionHealthWorkers::countMaleVaccinated0to11(), DwSubmission015::countMaleVaccinated0to11(), ['vaccinated']);
	}
	public static function indicatorFemale0to11() {
		return self::zipArrays(DwSubmissionHealthWorkers::countFemaleVaccinated0to11(), DwSubmission015::countFemaleVaccinated0to11(), ['vaccinated']);
	}
	public static function indicatorMale12to23() {
		return self::zipArrays(DwSubmissionHealthWorkers::countMaleVaccinated12to23(), DwSubmission015::countMaleVaccinated12to23(), ['vaccinated']);
	}
	public static function indicatorFemale12to23() {
		return self::zipArrays(DwSubmissionHealthWorkers::countFemaleVaccinated12to23(), DwSubmission015::countFemaleVaccinated12to23(), ['vaccinated']);
	}

	use DwSubmissionZipArraysTrait;

}
