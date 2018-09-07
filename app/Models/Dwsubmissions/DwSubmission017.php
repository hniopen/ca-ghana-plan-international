<?php

namespace App\Models\Dwsubmissions;

use App\Models\Traits\DwSubmissionHealthWorkersTrait;

use Eloquent as Model;

/**
 * Class DwSubmission017
 * @package App\Models\Dwsubmissions
 * @version January 11, 2018, 4:26 pm UTC
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
 * @property string title
 * @property string start_fill
 * @property string hf_choice
 * @property string hf_choice_district
 * @property string hf_choice_subdistrict
 * @property string hw_name
 * @property string date
 * @property string forms
 * @property string mncd
 * @property string mncd__mdeath
 * @property string mncd__mdeath__md
 * @property string mncd__mdeath__md__age15_md
 * @property string mncd__mdeath__md__age20_md
 * @property string mncd__mdeath__md__md_tot
 * @property string mncd__mdeath__md__md_display
 * @property string mncd__neo
 * @property string mncd__neo__nn
 * @property string mncd__neo__nn__girls_nn
 * @property string mncd__neo__nn__boys_nn
 * @property string mncd__neo__nn__nn_tot
 * @property string mncd__neo__nn__nn_display
 * @property string mncd__infant
 * @property string mncd__infant__id
 * @property string mncd__infant__id__girls_id
 * @property string mncd__infant__id__boys_id
 * @property string mncd__infant__id__id_tot
 * @property string mncd__infant__id__nn_display
 * @property string mncd__child_death
 * @property string mncd__child_death__cd
 * @property string mncd__child_death__cd__girls_cd
 * @property string mncd__child_death__cd__boys_cd
 * @property string mncd__child_death__cd__cd_tot
 * @property string mncd__child_death__cd__cd_display
 * @property string antenatal
 * @property string antenatal__select_category
 * @property string antenatal__age15_19_ant
 * @property string antenatal__age15_19_ant__anc_visit
 * @property string antenatal__age15_19_ant__anc1st_1
 * @property string antenatal__age15_19_ant__anc2nd_1
 * @property string antenatal__age15_19_ant__anc3rd_1
 * @property string antenatal__age15_19_ant__anc4th_1
 * @property string antenatal__age15_19_ant__anc5th_1
 * @property string antenatal__age15_19_ant__anc6th_1
 * @property string antenatal__age15_19_ant__anc7th_1
 * @property string antenatal__age15_19_ant__anc8th_1
 * @property string antenatal__age15_19_ant__anc9th_1
 * @property string antenatal__select_category2
 * @property string antenatal__age20_49_ant
 * @property string antenatal__age20_49_ant__anc_visit2
 * @property string antenatal__age20_49_ant__anc1st_2
 * @property string antenatal__age20_49_ant__anc2nd_2
 * @property string antenatal__age20_49_ant__anc3rd_2
 * @property string antenatal__age20_49_ant__anc4th_2
 * @property string antenatal__age20_49_ant__anc5th_2
 * @property string antenatal__age20_49_ant__anc6th_2
 * @property string antenatal__age20_49_ant__anc7th_2
 * @property string antenatal__age20_49_ant__anc8th_2
 * @property string antenatal__age20_49_ant__anc9th_2
 * @property string antenatal__anc1
 * @property string antenatal__anc1_display
 * @property string antenatal__anc2
 * @property string antenatal__anc2_display
 * @property string antenatal__anc3
 * @property string antenatal__anc3_display
 * @property string antenatal__anc4
 * @property string antenatal__anc4_display
 * @property string antenatal__anc5
 * @property string antenatal__anc5_display
 * @property string antenatal__anc6
 * @property string antenatal__anc6_display
 * @property string antenatal__anc7
 * @property string antenatal__anc7_display
 * @property string antenatal__anc8
 * @property string antenatal__anc8_display
 * @property string antenatal__anc9
 * @property string antenatal__anc9_display
 * @property string deiveries
 * @property string deiveries__locdel
 * @property string deiveries__locdeL_oth
 * @property string deiveries__delcon
 * @property string deiveries__if_oth
 * @property string deiveries__select_category_del
 * @property string deiveries__age15_del
 * @property string deiveries__age15_del__ancdel1_1
 * @property string deiveries__age20_49_del
 * @property string deiveries__age20_49_del__ancdel2_1
 * @property string deiveries__age20_49_del__ancdel_total
 * @property string deiveries__age20_49_del__ancdel_total_display
 * @property string pnc
 * @property string pnc__mother
 * @property string pnc__mother__select_category1
 * @property string pnc__mother__age15_19_pnc
 * @property string pnc__mother__age15_19_pnc__pv1
 * @property string pnc__mother__age15_19_pnc__pnc1_1
 * @property string pnc__mother__age15_19_pnc__pnc2_1
 * @property string pnc__mother__age15_19_pnc__pnc3_1
 * @property string pnc__mother__age15_19_pnc__pnc4_1
 * @property string pnc__mother__age20_49_pnc
 * @property string pnc__mother__age20_49_pnc__pv2
 * @property string pnc__mother__age20_49_pnc__pnc1_2
 * @property string pnc__mother__age20_49_pnc__pnc2_2
 * @property string pnc__mother__age20_49_pnc__pnc3_2
 * @property string pnc__mother__age20_49_pnc__pnc4_2
 * @property string pnc__mother__pnc1
 * @property string pnc__mother__pnc1_display
 * @property string pnc__mother__pnc2
 * @property string pnc__mother__pnc2_display
 * @property string pnc__mother__pnc3
 * @property string pnc__mother__pnc3_display
 * @property string pnc__mother__pnc4
 * @property string pnc__mother__pnc4_display
 * @property string pnc__babies
 * @property string pnc__babies__sex
 * @property string pnc__babies__gender_girls
 * @property string pnc__babies__gender_girls__pv_g
 * @property string pnc__babies__gender_girls__pnc1_g
 * @property string pnc__babies__gender_girls__pnc2_g
 * @property string pnc__babies__gender_girls__pnc3_g
 * @property string pnc__babies__gender_girls__pnc4_g
 * @property string pnc__babies__gender_boys
 * @property string pnc__babies__gender_boys__pv_b
 * @property string pnc__babies__gender_boys__pnc1_b
 * @property string pnc__babies__gender_boys__pnc2_b
 * @property string pnc__babies__gender_boys__pnc3_b
 * @property string pnc__babies__gender_boys__pnc4_b
 * @property string pnc__babies__pnc1_ch
 * @property string pnc__babies__pnc1_display_ch
 * @property string pnc__babies__pnc2_ch
 * @property string pnc__babies__pnc2_display_ch
 * @property string pnc__babies__pnc3_ch
 * @property string pnc__babies__pnc3_display_ch
 * @property string pnc__babies__pnc4_ch
 * @property string pnc__babies__pnc4_display_ch
 * @property string measles
 * @property string measles__select_month
 * @property string measles__age1_11
 * @property string measles__age1_11__sex_baby
 * @property string measles__age1_11__girls1_11
 * @property string measles__age1_11__girls1_11__dose_g1
 * @property string measles__age1_11__girls1_11__age1_11g_1
 * @property string measles__age1_11__boys1_11
 * @property string measles__age1_11__boys1_11__dose_b1
 * @property string measles__age1_11__boys1_11__age1_11b_1
 * @property string measles__age1_11__ms1
 * @property string measles__age1_11__ms1_display
 * @property string measles__age12_23
 * @property string measles__age12_23__sex_baby1
 * @property string measles__age12_23__girls12_23
 * @property string measles__age12_23__girls12_23__dose_g2
 * @property string measles__age12_23__girls12_23__age12_23g
 * @property string measles__age12_23__girls12_23__age12_23g1
 * @property string measles__age12_23__boys12_23
 * @property string measles__age12_23__boys12_23__dose_b2
 * @property string measles__age12_23__boys12_23__age12_23b
 * @property string measles__age12_23__boys12_23__age12_23b1
 * @property string measles__age12_23__ms2
 * @property string measles__age12_23__ms2_1
 * @property string measles__age12_23__ms2_display
 * @property string measles__age12_23__ms2_1_display
 * @property string end_fill
 */
class DwSubmission017 extends Model
{

    public $table = 'dw_submission017s';
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
        'title',
        'start_fill',
        'hf_choice',
        'hf_choice_district',
        'hf_choice_subdistrict',
        'hw_name',
        'date',
        'forms',
        'mncd',
        'mncd__mdeath',
        'mncd__mdeath__md',
        'mncd__mdeath__md__age15_md',
        'mncd__mdeath__md__age20_md',
        'mncd__mdeath__md__md_tot',
        'mncd__mdeath__md__md_display',
        'mncd__neo',
        'mncd__neo__nn',
        'mncd__neo__nn__girls_nn',
        'mncd__neo__nn__boys_nn',
        'mncd__neo__nn__nn_tot',
        'mncd__neo__nn__nn_display',
        'mncd__infant',
        'mncd__infant__id',
        'mncd__infant__id__girls_id',
        'mncd__infant__id__boys_id',
        'mncd__infant__id__id_tot',
        'mncd__infant__id__nn_display',
        'mncd__child_death',
        'mncd__child_death__cd',
        'mncd__child_death__cd__girls_cd',
        'mncd__child_death__cd__boys_cd',
        'mncd__child_death__cd__cd_tot',
        'mncd__child_death__cd__cd_display',
        'antenatal',
        'antenatal__select_category',
        'antenatal__age15_19_ant',
        'antenatal__age15_19_ant__anc_visit',
        'antenatal__age15_19_ant__anc1st_1',
        'antenatal__age15_19_ant__anc2nd_1',
        'antenatal__age15_19_ant__anc3rd_1',
        'antenatal__age15_19_ant__anc4th_1',
        'antenatal__age15_19_ant__anc5th_1',
        'antenatal__age15_19_ant__anc6th_1',
        'antenatal__age15_19_ant__anc7th_1',
        'antenatal__age15_19_ant__anc8th_1',
        'antenatal__age15_19_ant__anc9th_1',
        'antenatal__select_category2',
        'antenatal__age20_49_ant',
        'antenatal__age20_49_ant__anc_visit2',
        'antenatal__age20_49_ant__anc1st_2',
        'antenatal__age20_49_ant__anc2nd_2',
        'antenatal__age20_49_ant__anc3rd_2',
        'antenatal__age20_49_ant__anc4th_2',
        'antenatal__age20_49_ant__anc5th_2',
        'antenatal__age20_49_ant__anc6th_2',
        'antenatal__age20_49_ant__anc7th_2',
        'antenatal__age20_49_ant__anc8th_2',
        'antenatal__age20_49_ant__anc9th_2',
        'antenatal__anc1',
        'antenatal__anc1_display',
        'antenatal__anc2',
        'antenatal__anc2_display',
        'antenatal__anc3',
        'antenatal__anc3_display',
        'antenatal__anc4',
        'antenatal__anc4_display',
        'antenatal__anc5',
        'antenatal__anc5_display',
        'antenatal__anc6',
        'antenatal__anc6_display',
        'antenatal__anc7',
        'antenatal__anc7_display',
        'antenatal__anc8',
        'antenatal__anc8_display',
        'antenatal__anc9',
        'antenatal__anc9_display',
        'deiveries',
        'deiveries__locdel',
        'deiveries__locdeL_oth',
        'deiveries__delcon',
        'deiveries__if_oth',
        'deiveries__select_category_del',
        'deiveries__age15_del',
        'deiveries__age15_del__ancdel1_1',
        'deiveries__age20_49_del',
        'deiveries__age20_49_del__ancdel2_1',
        'deiveries__age20_49_del__ancdel_total',
        'deiveries__age20_49_del__ancdel_total_display',
        'pnc',
        'pnc__mother',
        'pnc__mother__select_category1',
        'pnc__mother__age15_19_pnc',
        'pnc__mother__age15_19_pnc__pv1',
        'pnc__mother__age15_19_pnc__pnc1_1',
        'pnc__mother__age15_19_pnc__pnc2_1',
        'pnc__mother__age15_19_pnc__pnc3_1',
        'pnc__mother__age15_19_pnc__pnc4_1',
        'pnc__mother__age20_49_pnc',
        'pnc__mother__age20_49_pnc__pv2',
        'pnc__mother__age20_49_pnc__pnc1_2',
        'pnc__mother__age20_49_pnc__pnc2_2',
        'pnc__mother__age20_49_pnc__pnc3_2',
        'pnc__mother__age20_49_pnc__pnc4_2',
        'pnc__mother__pnc1',
        'pnc__mother__pnc1_display',
        'pnc__mother__pnc2',
        'pnc__mother__pnc2_display',
        'pnc__mother__pnc3',
        'pnc__mother__pnc3_display',
        'pnc__mother__pnc4',
        'pnc__mother__pnc4_display',
        'pnc__babies',
        'pnc__babies__sex',
        'pnc__babies__gender_girls',
        'pnc__babies__gender_girls__pv_g',
        'pnc__babies__gender_girls__pnc1_g',
        'pnc__babies__gender_girls__pnc2_g',
        'pnc__babies__gender_girls__pnc3_g',
        'pnc__babies__gender_girls__pnc4_g',
        'pnc__babies__gender_boys',
        'pnc__babies__gender_boys__pv_b',
        'pnc__babies__gender_boys__pnc1_b',
        'pnc__babies__gender_boys__pnc2_b',
        'pnc__babies__gender_boys__pnc3_b',
        'pnc__babies__gender_boys__pnc4_b',
        'pnc__babies__pnc1_ch',
        'pnc__babies__pnc1_display_ch',
        'pnc__babies__pnc2_ch',
        'pnc__babies__pnc2_display_ch',
        'pnc__babies__pnc3_ch',
        'pnc__babies__pnc3_display_ch',
        'pnc__babies__pnc4_ch',
        'pnc__babies__pnc4_display_ch',
        'measles',
        'measles__select_month',
        'measles__age1_11',
        'measles__age1_11__sex_baby',
        'measles__age1_11__girls1_11',
        'measles__age1_11__girls1_11__dose_g1',
        'measles__age1_11__girls1_11__age1_11g_1',
        'measles__age1_11__boys1_11',
        'measles__age1_11__boys1_11__dose_b1',
        'measles__age1_11__boys1_11__age1_11b_1',
        'measles__age1_11__ms1',
        'measles__age1_11__ms1_display',
        'measles__age12_23',
        'measles__age12_23__sex_baby1',
        'measles__age12_23__girls12_23',
        'measles__age12_23__girls12_23__dose_g2',
        'measles__age12_23__girls12_23__age12_23g',
        'measles__age12_23__girls12_23__age12_23g1',
        'measles__age12_23__boys12_23',
        'measles__age12_23__boys12_23__dose_b2',
        'measles__age12_23__boys12_23__age12_23b',
        'measles__age12_23__boys12_23__age12_23b1',
        'measles__age12_23__ms2',
        'measles__age12_23__ms2_1',
        'measles__age12_23__ms2_display',
        'measles__age12_23__ms2_1_display',
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
        'title' => 'string',
        'start_fill' => 'string',
        'hf_choice' => 'string',
        'hf_choice_district' => 'string',
        'hf_choice_subdistrict' => 'string',
        'hw_name' => 'string',
        'date' => 'string',
        'forms' => 'string',
        'mncd' => 'string',
        'mncd__mdeath' => 'string',
        'mncd__mdeath__md' => 'string',
        'mncd__mdeath__md__age15_md' => 'string',
        'mncd__mdeath__md__age20_md' => 'string',
        'mncd__mdeath__md__md_tot' => 'string',
        'mncd__mdeath__md__md_display' => 'string',
        'mncd__neo' => 'string',
        'mncd__neo__nn' => 'string',
        'mncd__neo__nn__girls_nn' => 'string',
        'mncd__neo__nn__boys_nn' => 'string',
        'mncd__neo__nn__nn_tot' => 'string',
        'mncd__neo__nn__nn_display' => 'string',
        'mncd__infant' => 'string',
        'mncd__infant__id' => 'string',
        'mncd__infant__id__girls_id' => 'string',
        'mncd__infant__id__boys_id' => 'string',
        'mncd__infant__id__id_tot' => 'string',
        'mncd__infant__id__nn_display' => 'string',
        'mncd__child_death' => 'string',
        'mncd__child_death__cd' => 'string',
        'mncd__child_death__cd__girls_cd' => 'string',
        'mncd__child_death__cd__boys_cd' => 'string',
        'mncd__child_death__cd__cd_tot' => 'string',
        'mncd__child_death__cd__cd_display' => 'string',
        'antenatal' => 'string',
        'antenatal__select_category' => 'string',
        'antenatal__age15_19_ant' => 'string',
        'antenatal__age15_19_ant__anc_visit' => 'string',
        'antenatal__age15_19_ant__anc1st_1' => 'string',
        'antenatal__age15_19_ant__anc2nd_1' => 'string',
        'antenatal__age15_19_ant__anc3rd_1' => 'string',
        'antenatal__age15_19_ant__anc4th_1' => 'string',
        'antenatal__age15_19_ant__anc5th_1' => 'string',
        'antenatal__age15_19_ant__anc6th_1' => 'string',
        'antenatal__age15_19_ant__anc7th_1' => 'string',
        'antenatal__age15_19_ant__anc8th_1' => 'string',
        'antenatal__age15_19_ant__anc9th_1' => 'string',
        'antenatal__select_category2' => 'string',
        'antenatal__age20_49_ant' => 'string',
        'antenatal__age20_49_ant__anc_visit2' => 'string',
        'antenatal__age20_49_ant__anc1st_2' => 'string',
        'antenatal__age20_49_ant__anc2nd_2' => 'string',
        'antenatal__age20_49_ant__anc3rd_2' => 'string',
        'antenatal__age20_49_ant__anc4th_2' => 'string',
        'antenatal__age20_49_ant__anc5th_2' => 'string',
        'antenatal__age20_49_ant__anc6th_2' => 'string',
        'antenatal__age20_49_ant__anc7th_2' => 'string',
        'antenatal__age20_49_ant__anc8th_2' => 'string',
        'antenatal__age20_49_ant__anc9th_2' => 'string',
        'antenatal__anc1' => 'string',
        'antenatal__anc1_display' => 'string',
        'antenatal__anc2' => 'string',
        'antenatal__anc2_display' => 'string',
        'antenatal__anc3' => 'string',
        'antenatal__anc3_display' => 'string',
        'antenatal__anc4' => 'string',
        'antenatal__anc4_display' => 'string',
        'antenatal__anc5' => 'string',
        'antenatal__anc5_display' => 'string',
        'antenatal__anc6' => 'string',
        'antenatal__anc6_display' => 'string',
        'antenatal__anc7' => 'string',
        'antenatal__anc7_display' => 'string',
        'antenatal__anc8' => 'string',
        'antenatal__anc8_display' => 'string',
        'antenatal__anc9' => 'string',
        'antenatal__anc9_display' => 'string',
        'deiveries' => 'string',
        'deiveries__locdel' => 'string',
        'deiveries__locdeL_oth' => 'string',
        'deiveries__delcon' => 'string',
        'deiveries__if_oth' => 'string',
        'deiveries__select_category_del' => 'string',
        'deiveries__age15_del' => 'string',
        'deiveries__age15_del__ancdel1_1' => 'string',
        'deiveries__age20_49_del' => 'string',
        'deiveries__age20_49_del__ancdel2_1' => 'string',
        'deiveries__age20_49_del__ancdel_total' => 'string',
        'deiveries__age20_49_del__ancdel_total_display' => 'string',
        'pnc' => 'string',
        'pnc__mother' => 'string',
        'pnc__mother__select_category1' => 'string',
        'pnc__mother__age15_19_pnc' => 'string',
        'pnc__mother__age15_19_pnc__pv1' => 'string',
        'pnc__mother__age15_19_pnc__pnc1_1' => 'string',
        'pnc__mother__age15_19_pnc__pnc2_1' => 'string',
        'pnc__mother__age15_19_pnc__pnc3_1' => 'string',
        'pnc__mother__age15_19_pnc__pnc4_1' => 'string',
        'pnc__mother__age20_49_pnc' => 'string',
        'pnc__mother__age20_49_pnc__pv2' => 'string',
        'pnc__mother__age20_49_pnc__pnc1_2' => 'string',
        'pnc__mother__age20_49_pnc__pnc2_2' => 'string',
        'pnc__mother__age20_49_pnc__pnc3_2' => 'string',
        'pnc__mother__age20_49_pnc__pnc4_2' => 'string',
        'pnc__mother__pnc1' => 'string',
        'pnc__mother__pnc1_display' => 'string',
        'pnc__mother__pnc2' => 'string',
        'pnc__mother__pnc2_display' => 'string',
        'pnc__mother__pnc3' => 'string',
        'pnc__mother__pnc3_display' => 'string',
        'pnc__mother__pnc4' => 'string',
        'pnc__mother__pnc4_display' => 'string',
        'pnc__babies' => 'string',
        'pnc__babies__sex' => 'string',
        'pnc__babies__gender_girls' => 'string',
        'pnc__babies__gender_girls__pv_g' => 'string',
        'pnc__babies__gender_girls__pnc1_g' => 'string',
        'pnc__babies__gender_girls__pnc2_g' => 'string',
        'pnc__babies__gender_girls__pnc3_g' => 'string',
        'pnc__babies__gender_girls__pnc4_g' => 'string',
        'pnc__babies__gender_boys' => 'string',
        'pnc__babies__gender_boys__pv_b' => 'string',
        'pnc__babies__gender_boys__pnc1_b' => 'string',
        'pnc__babies__gender_boys__pnc2_b' => 'string',
        'pnc__babies__gender_boys__pnc3_b' => 'string',
        'pnc__babies__gender_boys__pnc4_b' => 'string',
        'pnc__babies__pnc1_ch' => 'string',
        'pnc__babies__pnc1_display_ch' => 'string',
        'pnc__babies__pnc2_ch' => 'string',
        'pnc__babies__pnc2_display_ch' => 'string',
        'pnc__babies__pnc3_ch' => 'string',
        'pnc__babies__pnc3_display_ch' => 'string',
        'pnc__babies__pnc4_ch' => 'string',
        'pnc__babies__pnc4_display_ch' => 'string',
        'measles' => 'string',
        'measles__select_month' => 'string',
        'measles__age1_11' => 'string',
        'measles__age1_11__sex_baby' => 'string',
        'measles__age1_11__girls1_11' => 'string',
        'measles__age1_11__girls1_11__dose_g1' => 'string',
        'measles__age1_11__girls1_11__age1_11g_1' => 'string',
        'measles__age1_11__boys1_11' => 'string',
        'measles__age1_11__boys1_11__dose_b1' => 'string',
        'measles__age1_11__boys1_11__age1_11b_1' => 'string',
        'measles__age1_11__ms1' => 'string',
        'measles__age1_11__ms1_display' => 'string',
        'measles__age12_23' => 'string',
        'measles__age12_23__sex_baby1' => 'string',
        'measles__age12_23__girls12_23' => 'string',
        'measles__age12_23__girls12_23__dose_g2' => 'string',
        'measles__age12_23__girls12_23__age12_23g' => 'string',
        'measles__age12_23__girls12_23__age12_23g1' => 'string',
        'measles__age12_23__boys12_23' => 'string',
        'measles__age12_23__boys12_23__dose_b2' => 'string',
        'measles__age12_23__boys12_23__age12_23b' => 'string',
        'measles__age12_23__boys12_23__age12_23b1' => 'string',
        'measles__age12_23__ms2' => 'string',
        'measles__age12_23__ms2_1' => 'string',
        'measles__age12_23__ms2_display' => 'string',
        'measles__age12_23__ms2_1_display' => 'string',
        'end_fill' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

	private static function deliveriesSelectStrings15To19($asWhat) {
		return array_merge([
			self::$dateSelect,
			"SUM(deiveries__age15_del__ancdel1_1) as ".$asWhat
		]);
	}
	private static function deliveriesSelectStrings20To49($asWhat) {
		return array_merge([
			self::$dateSelect,
			"SUM(deiveries__age20_49_del__ancdel2_1) as ".$asWhat
		]);
	}
	private static function applyDeliveriesWhere($query) {
		return $query->whereIn('deiveries__locdel', ['chps_choice', 'health_choice', 'poly_choice']);
	}
	private static function applySkilledHealthWorkerDeliveriesWhere($query) {
		return $query->whereNotIn('deiveries__delcon', ['other', 'tba']);
	}
	private static function applyThisQuestionnaireTimePeriodWhere($query) {
		return $query->whereRaw("STR_TO_DATE(date,'%d.%m.%Y') < STR_TO_DATE('01.01.2018','%d.%m.%Y')");
	}

	use DwSubmissionHealthWorkersTrait;

}
