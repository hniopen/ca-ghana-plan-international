<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDwSubmission017sTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dw_submission017s', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('projectId');
			$table->string('submissionId', 50);
			$table->string('dwSubmittedAt', 191);
			$table->string('dwSubmittedAt_u', 20);
			$table->string('dwUpdatedAt', 191)->nullable();
			$table->string('dwUpdatedAt_u', 20)->nullable();
			$table->string('status', 20)->nullable();
			$table->boolean('isValid')->default(0);
			$table->string('datasenderId', 10)->nullable();
			$table->string('cleanFlag', 30)->nullable();
			$table->string('pushIdnrStatus', 30)->nullable();
			$table->text('title', 65535)->nullable();
			$table->text('start_fill', 65535)->nullable();
			$table->text('hf_choice', 65535)->nullable();
			$table->text('hf_choice_district', 65535)->nullable();
			$table->text('hf_choice_subdistrict', 65535)->nullable();
			$table->text('hw_name', 65535)->nullable();
			$table->string('date', 20)->nullable();
			$table->text('forms', 65535)->nullable();
			$table->text('mncd', 65535)->nullable();
			$table->text('mncd__mdeath', 65535)->nullable();
			$table->text('mncd__mdeath__md', 65535)->nullable();
			$table->string('mncd__mdeath__md__age15_md', 20)->nullable();
			$table->string('mncd__mdeath__md__age20_md', 20)->nullable();
			$table->text('mncd__mdeath__md__md_tot', 65535)->nullable();
			$table->text('mncd__mdeath__md__md_display', 65535)->nullable();
			$table->text('mncd__neo', 65535)->nullable();
			$table->text('mncd__neo__nn', 65535)->nullable();
			$table->string('mncd__neo__nn__girls_nn', 20)->nullable();
			$table->string('mncd__neo__nn__boys_nn', 20)->nullable();
			$table->text('mncd__neo__nn__nn_tot', 65535)->nullable();
			$table->text('mncd__neo__nn__nn_display', 65535)->nullable();
			$table->text('mncd__infant', 65535)->nullable();
			$table->text('mncd__infant__id', 65535)->nullable();
			$table->string('mncd__infant__id__girls_id', 20)->nullable();
			$table->string('mncd__infant__id__boys_id', 20)->nullable();
			$table->text('mncd__infant__id__id_tot', 65535)->nullable();
			$table->text('mncd__infant__id__nn_display', 65535)->nullable();
			$table->text('mncd__child_death', 65535)->nullable();
			$table->text('mncd__child_death__cd', 65535)->nullable();
			$table->string('mncd__child_death__cd__girls_cd', 20)->nullable();
			$table->string('mncd__child_death__cd__boys_cd', 20)->nullable();
			$table->text('mncd__child_death__cd__cd_tot', 65535)->nullable();
			$table->text('mncd__child_death__cd__cd_display', 65535)->nullable();
			$table->text('antenatal', 65535)->nullable();
			$table->text('antenatal__select_category', 65535)->nullable();
			$table->text('antenatal__age15_19_ant', 65535)->nullable();
			$table->text('antenatal__age15_19_ant__anc_visit', 65535)->nullable();
			$table->string('antenatal__age15_19_ant__anc1st_1', 20)->nullable();
			$table->string('antenatal__age15_19_ant__anc2nd_1', 20)->nullable();
			$table->string('antenatal__age15_19_ant__anc3rd_1', 20)->nullable();
			$table->string('antenatal__age15_19_ant__anc4th_1', 20)->nullable();
			$table->string('antenatal__age15_19_ant__anc5th_1', 20)->nullable();
			$table->string('antenatal__age15_19_ant__anc6th_1', 20)->nullable();
			$table->string('antenatal__age15_19_ant__anc7th_1', 20)->nullable();
			$table->string('antenatal__age15_19_ant__anc8th_1', 20)->nullable();
			$table->string('antenatal__age15_19_ant__anc9th_1', 20)->nullable();
			$table->text('antenatal__select_category2', 65535)->nullable();
			$table->text('antenatal__age20_49_ant', 65535)->nullable();
			$table->text('antenatal__age20_49_ant__anc_visit2', 65535)->nullable();
			$table->string('antenatal__age20_49_ant__anc1st_2', 20)->nullable();
			$table->string('antenatal__age20_49_ant__anc2nd_2', 20)->nullable();
			$table->string('antenatal__age20_49_ant__anc3rd_2', 20)->nullable();
			$table->string('antenatal__age20_49_ant__anc4th_2', 20)->nullable();
			$table->string('antenatal__age20_49_ant__anc5th_2', 20)->nullable();
			$table->string('antenatal__age20_49_ant__anc6th_2', 20)->nullable();
			$table->string('antenatal__age20_49_ant__anc7th_2', 20)->nullable();
			$table->string('antenatal__age20_49_ant__anc8th_2', 20)->nullable();
			$table->string('antenatal__age20_49_ant__anc9th_2', 20)->nullable();
			$table->text('antenatal__anc1', 65535)->nullable();
			$table->text('antenatal__anc1_display', 65535)->nullable();
			$table->text('antenatal__anc2', 65535)->nullable();
			$table->text('antenatal__anc2_display', 65535)->nullable();
			$table->text('antenatal__anc3', 65535)->nullable();
			$table->text('antenatal__anc3_display', 65535)->nullable();
			$table->text('antenatal__anc4', 65535)->nullable();
			$table->text('antenatal__anc4_display', 65535)->nullable();
			$table->text('antenatal__anc5', 65535)->nullable();
			$table->text('antenatal__anc5_display', 65535)->nullable();
			$table->text('antenatal__anc6', 65535)->nullable();
			$table->text('antenatal__anc6_display', 65535)->nullable();
			$table->text('antenatal__anc7', 65535)->nullable();
			$table->text('antenatal__anc7_display', 65535)->nullable();
			$table->text('antenatal__anc8', 65535)->nullable();
			$table->text('antenatal__anc8_display', 65535)->nullable();
			$table->text('antenatal__anc9', 65535)->nullable();
			$table->text('antenatal__anc9_display', 65535)->nullable();
			$table->text('deiveries', 65535)->nullable();
			$table->text('deiveries__locdel', 65535)->nullable();
			$table->text('deiveries__locdeL_oth', 65535)->nullable();
			$table->text('deiveries__delcon', 65535)->nullable();
			$table->text('deiveries__if_oth', 65535)->nullable();
			$table->text('deiveries__select_category_del', 65535)->nullable();
			$table->text('deiveries__age15_del', 65535)->nullable();
			$table->string('deiveries__age15_del__ancdel1_1', 20)->nullable();
			$table->text('deiveries__age20_49_del', 65535)->nullable();
			$table->string('deiveries__age20_49_del__ancdel2_1', 20)->nullable();
			$table->text('deiveries__age20_49_del__ancdel_total', 65535)->nullable();
			$table->text('deiveries__age20_49_del__ancdel_total_display', 65535)->nullable();
			$table->text('pnc', 65535)->nullable();
			$table->text('pnc__mother', 65535)->nullable();
			$table->text('pnc__mother__select_category1', 65535)->nullable();
			$table->text('pnc__mother__age15_19_pnc', 65535)->nullable();
			$table->text('pnc__mother__age15_19_pnc__pv1', 65535)->nullable();
			$table->string('pnc__mother__age15_19_pnc__pnc1_1', 20)->nullable();
			$table->string('pnc__mother__age15_19_pnc__pnc2_1', 20)->nullable();
			$table->string('pnc__mother__age15_19_pnc__pnc3_1', 20)->nullable();
			$table->string('pnc__mother__age15_19_pnc__pnc4_1', 20)->nullable();
			$table->text('pnc__mother__age20_49_pnc', 65535)->nullable();
			$table->text('pnc__mother__age20_49_pnc__pv2', 65535)->nullable();
			$table->string('pnc__mother__age20_49_pnc__pnc1_2', 20)->nullable();
			$table->string('pnc__mother__age20_49_pnc__pnc2_2', 20)->nullable();
			$table->string('pnc__mother__age20_49_pnc__pnc3_2', 20)->nullable();
			$table->string('pnc__mother__age20_49_pnc__pnc4_2', 20)->nullable();
			$table->text('pnc__mother__pnc1', 65535)->nullable();
			$table->text('pnc__mother__pnc1_display', 65535)->nullable();
			$table->text('pnc__mother__pnc2', 65535)->nullable();
			$table->text('pnc__mother__pnc2_display', 65535)->nullable();
			$table->text('pnc__mother__pnc3', 65535)->nullable();
			$table->text('pnc__mother__pnc3_display', 65535)->nullable();
			$table->text('pnc__mother__pnc4', 65535)->nullable();
			$table->text('pnc__mother__pnc4_display', 65535)->nullable();
			$table->text('pnc__babies', 65535)->nullable();
			$table->text('pnc__babies__sex', 65535)->nullable();
			$table->text('pnc__babies__gender_girls', 65535)->nullable();
			$table->text('pnc__babies__gender_girls__pv_g', 65535)->nullable();
			$table->string('pnc__babies__gender_girls__pnc1_g', 20)->nullable();
			$table->string('pnc__babies__gender_girls__pnc2_g', 20)->nullable();
			$table->string('pnc__babies__gender_girls__pnc3_g', 20)->nullable();
			$table->string('pnc__babies__gender_girls__pnc4_g', 20)->nullable();
			$table->text('pnc__babies__gender_boys', 65535)->nullable();
			$table->text('pnc__babies__gender_boys__pv_b', 65535)->nullable();
			$table->string('pnc__babies__gender_boys__pnc1_b', 20)->nullable();
			$table->string('pnc__babies__gender_boys__pnc2_b', 20)->nullable();
			$table->string('pnc__babies__gender_boys__pnc3_b', 20)->nullable();
			$table->string('pnc__babies__gender_boys__pnc4_b', 20)->nullable();
			$table->text('pnc__babies__pnc1_ch', 65535)->nullable();
			$table->text('pnc__babies__pnc1_display_ch', 65535)->nullable();
			$table->text('pnc__babies__pnc2_ch', 65535)->nullable();
			$table->text('pnc__babies__pnc2_display_ch', 65535)->nullable();
			$table->text('pnc__babies__pnc3_ch', 65535)->nullable();
			$table->text('pnc__babies__pnc3_display_ch', 65535)->nullable();
			$table->text('pnc__babies__pnc4_ch', 65535)->nullable();
			$table->text('pnc__babies__pnc4_display_ch', 65535)->nullable();
			$table->text('measles', 65535)->nullable();
			$table->text('measles__select_month', 65535)->nullable();
			$table->text('measles__age1_11', 65535)->nullable();
			$table->text('measles__age1_11__sex_baby', 65535)->nullable();
			$table->text('measles__age1_11__girls1_11', 65535)->nullable();
			$table->text('measles__age1_11__girls1_11__dose_g1', 65535)->nullable();
			$table->string('measles__age1_11__girls1_11__age1_11g_1', 20)->nullable();
			$table->text('measles__age1_11__boys1_11', 65535)->nullable();
			$table->text('measles__age1_11__boys1_11__dose_b1', 65535)->nullable();
			$table->string('measles__age1_11__boys1_11__age1_11b_1', 20)->nullable();
			$table->text('measles__age1_11__ms1', 65535)->nullable();
			$table->text('measles__age1_11__ms1_display', 65535)->nullable();
			$table->text('measles__age12_23', 65535)->nullable();
			$table->text('measles__age12_23__sex_baby1', 65535)->nullable();
			$table->text('measles__age12_23__girls12_23', 65535)->nullable();
			$table->text('measles__age12_23__girls12_23__dose_g2', 65535)->nullable();
			$table->string('measles__age12_23__girls12_23__age12_23g', 20)->nullable();
			$table->string('measles__age12_23__girls12_23__age12_23g1', 20)->nullable();
			$table->text('measles__age12_23__boys12_23', 65535)->nullable();
			$table->text('measles__age12_23__boys12_23__dose_b2', 65535)->nullable();
			$table->string('measles__age12_23__boys12_23__age12_23b', 20)->nullable();
			$table->string('measles__age12_23__boys12_23__age12_23b1', 20)->nullable();
			$table->text('measles__age12_23__ms2', 65535)->nullable();
			$table->text('measles__age12_23__ms2_1', 65535)->nullable();
			$table->text('measles__age12_23__ms2_display', 65535)->nullable();
			$table->text('measles__age12_23__ms2_1_display', 65535)->nullable();
			$table->text('end_fill', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dw_submission017s');
	}

}
