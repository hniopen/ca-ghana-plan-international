<?php

namespace App\Models\Dwsubmissions;

use DB;
use App\Models\Traits\DwSubmissionGenericQueryTraits;
use App\Models\Traits\DwSubmissionZipArraysTrait;
use Carbon\Carbon;

use Eloquent as Model;

/**
 * Class DwSubmission015
 * @package App\Models\Dwsubmissions
 * @version January 12, 2018, 12:32 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property integer projectId
 * @property string submissionId
 * @property string dwSubmittedAt
 * @property string dwSubmittedAt_u
 * @property string dwUpdatedAt
 * @property string dwUpdatedAt_u
 * @property string status
 * @property boolean isValid
 * @property string datasenderId
 * @property string cleanFlag
 * @property string pushIdnrStatus
 * @property string start_fill
 * @property string title
 * @property string community_choice
 * @property string community_choice_district
 * @property string community_choice_subdistrict
 * @property string chv_name
 * @property string date
 * @property string forms
 * @property string antenatal
 * @property string antenatal__name
 * @property string antenatal__phone
 * @property string antenatal__age
 * @property string antenatal__birth_year
 * @property string antenatal__house_number
 * @property string antenatal__visit
 * @property string antenatal__age_choice
 * @property string antenatal__visit_date
 * @property string deiveries
 * @property string deiveries__preg_age
 * @property string deiveries__gave_birth
 * @property string deiveries__del_loc
 * @property string deiveries__specify_loc
 * @property string deiveries__who
 * @property string deiveries__specify
 * @property string deiveries__out_del
 * @property string deiveries__specify1
 * @property string deiveries__still
 * @property string pnc
 * @property string pnc__age_mother
 * @property string pnc__pnc_mom
 * @property string pnc__number_child
 * @property string pnc__baby_sex
 * @property string pnc__for_ch2
 * @property string pnc__for_ch2__if_2_b
 * @property string pnc__for_ch2__if_2_g
 * @property string pnc__for_ch3
 * @property string pnc__for_ch3__if_3_b
 * @property string pnc__for_ch3__if_3_g
 * @property string pnc__for_ch4
 * @property string pnc__for_ch4__if_4
 * @property string pnc__for_ch4__if_4_b
 * @property string pnc__for_ch4__if_4_g
 * @property string pnc__for_ch4__tot_ch
 * @property string pnc__birth_baby
 * @property string pnc__pnc_baby
 * @property string measles
 * @property string measles__age_baby
 * @property string measles__baby_sex
 * @property string measles__meas_18
 * @property string measles__meas
 * @property string sensitization
 * @property string sensitization__topic
 * @property string sensitization__mnch
 * @property string sensitization__which_pers
 * @property string sensitization__hus_age
 * @property string sensitization__mil_ques
 * @property string sensitization__mil_ques__mil_preg
 * @property string sensitization__mil_ques__mil_age
 * @property string sensitization__fil_age
 * @property string sensitization__how_sis
 * @property string sensitization__sis_numb
 * @property string sensitization__sis_numb__sis_preg
 * @property string sensitization__sis_numb__sis_age
 * @property string sensitization__how_bro
 * @property string sensitization__bro_numb
 * @property string sensitization__bro_numb__bro_age
 * @property string sensitization__oth_pers
 * @property string sensitization__how_male
 * @property string sensitization__males
 * @property string sensitization__males__age_male
 * @property string sensitization__how_female_oth
 * @property string sensitization__fem_numb
 * @property string sensitization__fem_numb__oth_preg
 * @property string sensitization__fem_numb__oth_fem_age
 * @property string sensitization__pers_topic
 * @property string end_fill
 */
class DwSubmission015 extends Model
{

    public $table = 'dw_submission015s';
    public $timestamps = false; /* forced to be false 
    public $timestamps = false;
 */


    public $fillable = [
        'projectId',
        'submissionId',
        'dwSubmittedAt',
        'dwSubmittedAt_u',
        'dwUpdatedAt',
        'dwUpdatedAt_u',
        'status',
        'isValid',
        'datasenderId',
        'cleanFlag',
        'pushIdnrStatus',
        'start_fill',
        'title',
        'community_choice',
        'community_choice_district',
        'community_choice_subdistrict',
        'chv_name',
        'date',
        'forms',
        'antenatal',
        'antenatal__name',
        'antenatal__phone',
        'antenatal__age',
        'antenatal__birth_year',
        'antenatal__house_number',
        'antenatal__visit',
        'antenatal__age_choice',
        'antenatal__visit_date',
        'deiveries',
        'deiveries__preg_age',
        'deiveries__gave_birth',
        'deiveries__del_loc',
        'deiveries__specify_loc',
        'deiveries__who',
        'deiveries__specify',
        'deiveries__out_del',
        'deiveries__specify1',
        'deiveries__still',
        'pnc',
        'pnc__age_mother',
        'pnc__pnc_mom',
        'pnc__number_child',
        'pnc__baby_sex',
        'pnc__for_ch2',
        'pnc__for_ch2__if_2_b',
        'pnc__for_ch2__if_2_g',
        'pnc__for_ch3',
        'pnc__for_ch3__if_3_b',
        'pnc__for_ch3__if_3_g',
        'pnc__for_ch4',
        'pnc__for_ch4__if_4',
        'pnc__for_ch4__if_4_b',
        'pnc__for_ch4__if_4_g',
        'pnc__for_ch4__tot_ch',
        'pnc__birth_baby',
        'pnc__pnc_baby',
        'measles',
        'measles__age_baby',
        'measles__baby_sex',
        'measles__meas_18',
        'measles__meas',
        'sensitization',
        'sensitization__topic',
        'sensitization__mnch',
        'sensitization__which_pers',
        'sensitization__hus_age',
        'sensitization__mil_ques',
        'sensitization__mil_ques__mil_preg',
        'sensitization__mil_ques__mil_age',
        'sensitization__fil_age',
        'sensitization__how_sis',
        'sensitization__sis_numb',
        'sensitization__sis_numb__sis_preg',
        'sensitization__sis_numb__sis_age',
        'sensitization__how_bro',
        'sensitization__bro_numb',
        'sensitization__bro_numb__bro_age',
        'sensitization__oth_pers',
        'sensitization__how_male',
        'sensitization__males',
        'sensitization__males__age_male',
        'sensitization__how_female_oth',
        'sensitization__fem_numb',
        'sensitization__fem_numb__oth_preg',
        'sensitization__fem_numb__oth_fem_age',
        'sensitization__pers_topic',
        'end_fill'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'projectId' => 'integer',
        'submissionId' => 'string',
        'dwSubmittedAt' => 'string',
        'dwSubmittedAt_u' => 'string',
        'dwUpdatedAt' => 'string',
        'dwUpdatedAt_u' => 'string',
        'status' => 'string',
        'isValid' => 'boolean',
        'datasenderId' => 'string',
        'cleanFlag' => 'string',
        'pushIdnrStatus' => 'string',
        'start_fill' => 'string',
        'title' => 'string',
        'community_choice' => 'string',
        'community_choice_district' => 'string',
        'community_choice_subdistrict' => 'string',
        'chv_name' => 'string',
        'date' => 'string',
        'forms' => 'string',
        'antenatal' => 'string',
        'antenatal__name' => 'string',
        'antenatal__phone' => 'string',
        'antenatal__age' => 'string',
        'antenatal__birth_year' => 'string',
        'antenatal__house_number' => 'string',
        'antenatal__visit' => 'string',
        'antenatal__age_choice' => 'string',
        'antenatal__visit_date' => 'string',
        'deiveries' => 'string',
        'deiveries__preg_age' => 'string',
        'deiveries__gave_birth' => 'string',
        'deiveries__del_loc' => 'string',
        'deiveries__specify_loc' => 'string',
        'deiveries__who' => 'string',
        'deiveries__specify' => 'string',
        'deiveries__out_del' => 'string',
        'deiveries__specify1' => 'string',
        'deiveries__still' => 'string',
        'pnc' => 'string',
        'pnc__age_mother' => 'string',
        'pnc__pnc_mom' => 'string',
        'pnc__number_child' => 'string',
        'pnc__baby_sex' => 'string',
        'pnc__for_ch2' => 'string',
        'pnc__for_ch2__if_2_b' => 'string',
        'pnc__for_ch2__if_2_g' => 'string',
        'pnc__for_ch3' => 'string',
        'pnc__for_ch3__if_3_b' => 'string',
        'pnc__for_ch3__if_3_g' => 'string',
        'pnc__for_ch4' => 'string',
        'pnc__for_ch4__if_4' => 'string',
        'pnc__for_ch4__if_4_b' => 'string',
        'pnc__for_ch4__if_4_g' => 'string',
        'pnc__for_ch4__tot_ch' => 'string',
        'pnc__birth_baby' => 'string',
        'pnc__pnc_baby' => 'string',
        'measles' => 'string',
        'measles__age_baby' => 'string',
        'measles__baby_sex' => 'string',
        'measles__meas_18' => 'string',
        'measles__meas' => 'string',
        'sensitization' => 'string',
        'sensitization__topic' => 'string',
        'sensitization__mnch' => 'string',
        'sensitization__which_pers' => 'string',
        'sensitization__hus_age' => 'string',
        'sensitization__mil_ques' => 'string',
        'sensitization__mil_ques__mil_preg' => 'string',
        'sensitization__mil_ques__mil_age' => 'string',
        'sensitization__fil_age' => 'string',
        'sensitization__how_sis' => 'string',
        'sensitization__sis_numb' => 'string',
        'sensitization__sis_numb__sis_preg' => 'string',
        'sensitization__sis_numb__sis_age' => 'string',
        'sensitization__how_bro' => 'string',
        'sensitization__bro_numb' => 'string',
        'sensitization__bro_numb__bro_age' => 'string',
        'sensitization__oth_pers' => 'string',
        'sensitization__how_male' => 'string',
        'sensitization__males' => 'string',
        'sensitization__males__age_male' => 'string',
        'sensitization__how_female_oth' => 'string',
        'sensitization__fem_numb' => 'string',
        'sensitization__fem_numb__oth_preg' => 'string',
        'sensitization__fem_numb__oth_fem_age' => 'string',
        'sensitization__pers_topic' => 'string',
        'end_fill' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

	use DwSubmissionGenericQueryTraits;

	private static $groupBy = "YEAR(STR_TO_DATE(date,'%d.%m.%Y')), MONTH(STR_TO_DATE(date,'%d.%m.%Y'))";
	private static $deliveriesGroupBy= "YEAR(STR_TO_DATE(deiveries__gave_birth,'%d.%m.%Y')), MONTH(STR_TO_DATE(deiveries__gave_birth,'%d.%m.%Y'))";
	private static function deliveriesOrderBy() {
	   return self::$deliveriesGroupBy;
	}

	private static function deliveriesSelectStrings() {
		return array_merge([
			"YEAR(STR_TO_DATE(deiveries__gave_birth,'%d.%m.%Y')) as year, MONTH(STR_TO_DATE(deiveries__gave_birth,'%d.%m.%Y')) as month",
			"COUNT(id) as deliveries"
		]);
	}
	private static function vaccinationsSelectStrings() {
		return self::genericSelectStrings("vaccinated");
	}
	private static function genericSelectStrings($asWhat) {
		return array_merge([
			"YEAR(STR_TO_DATE(date,'%d.%m.%Y')) as year, MONTH(STR_TO_DATE(date,'%d.%m.%Y')) as month",
			"COUNT(id) as ".$asWhat
		]);
	}

	//vaccinations
	private static function applyGenericVaccinationsWhere($query) {
		return $query->whereNotNull('measles__baby_sex')
			->whereRaw("(measles__meas_18 = 'under_18' OR measles__meas is not null)");
	}
	private static function apply0to11VaccinationsWhere($query) {
		return $query->where('measles__age_baby', '<=', 11);
	}
	private static function apply12to23VaccinationsWhere($query) {
		return $query->where('measles__age_baby', '>', 11);
	}
	private static function applyBoysWhere($query) {
		return $query->where('measles__baby_sex', '=', "boy");
	}
	private static function applyGirlsWhere($query) {
		return $query->where('measles__baby_sex', '=', "girl");
	}

	//deliveries
	private static function applyGenericDeliveriesWhere($query) {
		return $query->whereNotNull('deiveries__del_loc')
			->whereNotNull('deiveries__preg_age')
			->whereIn('deiveries__del_loc', ['home','other_loc']);
	}
	private static function apply15to19DeliveriesWhere($query) {
		return $query->where('deiveries__preg_age', '>=', 15)
			->where('deiveries__preg_age', '<=', 19);
	}
	private static function apply20to49DeliveriesWhere($query) {
		return $query->where('deiveries__preg_age', '>=', 20)
			->where('deiveries__preg_age', '<=', 49);
	}

	private static function applyTimePeriodWhere($query) {
		return $query->whereRaw(
			"status != 'deleted'
			 AND STR_TO_DATE(deiveries__gave_birth,'%d.%m.%Y') >= STR_TO_DATE('1.11.2017','%d.%m.%Y')
			 AND STR_TO_DATE(deiveries__gave_birth,'%d.%m.%Y') < STR_TO_DATE('1.".Carbon::now()->format('m.Y')."','%d.%m.%Y')");
	}

	//TODO: Very few women have recorded age here?
	/*
	 * Delivering per month community 
	 */
	//Returns the number of women recorded by community workers who delivered per month 
	public static function countCommunityDeliveryPerMonth() {
		return self::zipArrays(self::count15to19CommunityDeliveryPerMonth()->toArray(), self::count20to49CommunityDeliveryPerMonth()->toArray(), ['deliveries']);
	}
	//Returns the number of women ages 15-19 recorded by community workers who delivered per month 
	public static function count15to19CommunityDeliveryPerMonth() {
		$query = self::select(array_map('DB::raw', self::deliveriesSelectStrings()))
            ->groupBy(DB::raw(self::$deliveriesGroupBy))   
            ->orderBy(DB::raw(self::deliveriesOrderBy())); 
        $query = self::applyGenericDeliveriesWhere($query);
        $query = self::applyTimePeriodWhere($query);
        $query = self::apply15to19DeliveriesWhere($query);
        return $query->get();
	}
	//Returns the number of women ages 20-49 recorded by community workers who delivered per month 
	public static function count20to49CommunityDeliveryPerMonth() {
		$query = self::select(array_map('DB::raw', self::deliveriesSelectStrings()))
            ->groupBy(DB::raw(self::$deliveriesGroupBy))   
            ->orderBy(DB::raw(self::deliveriesOrderBy())); 
        $query = self::applyGenericDeliveriesWhere($query);
        $query = self::applyTimePeriodWhere($query);
        return self::apply20to49DeliveriesWhere($query)->get();
	}

	/*
	 * Childen receiving one or more vaccines per month
	 */
	//Returns the number of male babies 0-11 months old who have been vaccinated at least once 
	public static function countMaleVaccinated0to11() {
		$query = self::select(array_map('DB::raw', self::vaccinationsSelectStrings()))
            ->groupBy(DB::raw(self::$groupBy))   
            ->orderBy(DB::raw(self::orderBy())); 
        $query = self::applyGenericVaccinationsWhere($query);
        $query = self::apply0to11VaccinationsWhere($query);
        $query = self::applyBoysWhere($query);
        return self::applyTimePeriodWhere($query)->get()->toArray();
	}
	//Returns the number of male babies 12-23 months old who have been vaccinated at least once 
	public static function countMaleVaccinated12to23() {
		$query = self::select(array_map('DB::raw', self::vaccinationsSelectStrings()))
            ->groupBy(DB::raw(self::$groupBy))   
            ->orderBy(DB::raw(self::orderBy())); 
        $query = self::applyGenericVaccinationsWhere($query);
        $query = self::apply12to23VaccinationsWhere($query);
        $query = self::applyBoysWhere($query);
        return self::applyTimePeriodWhere($query)->get()->toArray();
	}
	//Returns the number of female babies 0-11 months old who have been vaccinated at least once 
	public static function countFemaleVaccinated0to11() {
		$query = self::select(array_map('DB::raw', self::vaccinationsSelectStrings()))
            ->groupBy(DB::raw(self::$groupBy))   
            ->orderBy(DB::raw(self::orderBy())); 
        $query = self::applyGenericVaccinationsWhere($query);
        $query = self::apply0to11VaccinationsWhere($query);
        $query = self::applyGirlsWhere($query);
        return self::applyTimePeriodWhere($query)->get()->toArray();
	}
	//Returns the number of female babies 12-23 months old who have been vaccinated at least once 
	public static function countFemaleVaccinated12to23() {
		$query = self::select(array_map('DB::raw', self::vaccinationsSelectStrings()))
            ->groupBy(DB::raw(self::$groupBy))   
            ->orderBy(DB::raw(self::orderBy())); 
        $query = self::applyGenericVaccinationsWhere($query);
        $query = self::apply12to23VaccinationsWhere($query);
        $query = self::applyGirlsWhere($query);
        return self::applyTimePeriodWhere($query)->get()->toArray();
	}
    
	use DwSubmissionZipArraysTrait;
    
}
