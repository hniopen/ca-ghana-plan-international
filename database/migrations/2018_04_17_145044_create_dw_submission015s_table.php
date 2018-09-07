<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDwSubmission015sTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dw_submission015s', function(Blueprint $table)
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
			$table->text('start_fill', 65535)->nullable();
			$table->text('title', 65535)->nullable();
			$table->text('community_choice', 65535)->nullable();
			$table->text('community_choice_district', 65535)->nullable();
			$table->text('community_choice_subdistrict', 65535)->nullable();
			$table->text('chv_name', 65535)->nullable();
			$table->string('date', 20)->nullable();
			$table->text('forms', 65535)->nullable();
			$table->text('antenatal', 65535)->nullable();
			$table->text('antenatal__name', 65535)->nullable();
			$table->text('antenatal__phone', 65535)->nullable();
			$table->string('antenatal__age', 20)->nullable();
			$table->text('antenatal__birth_year', 65535)->nullable();
			$table->text('antenatal__house_number', 65535)->nullable();
			$table->text('antenatal__visit', 65535)->nullable();
			$table->text('antenatal__age_choice', 65535)->nullable();
			$table->string('antenatal__visit_date', 20)->nullable();
			$table->text('deiveries', 65535)->nullable();
			$table->string('deiveries__preg_age', 20)->nullable();
			$table->string('deiveries__gave_birth', 20)->nullable();
			$table->text('deiveries__del_loc', 65535)->nullable();
			$table->text('deiveries__specify_loc', 65535)->nullable();
			$table->text('deiveries__who', 65535)->nullable();
			$table->text('deiveries__specify', 65535)->nullable();
			$table->text('deiveries__out_del', 65535)->nullable();
			$table->string('deiveries__specify1', 20)->nullable();
			$table->string('deiveries__still', 20)->nullable();
			$table->text('pnc', 65535)->nullable();
			$table->string('pnc__age_mother', 20)->nullable();
			$table->text('pnc__pnc_mom', 65535)->nullable();
			$table->text('pnc__number_child', 65535)->nullable();
			$table->text('pnc__baby_sex', 65535)->nullable();
			$table->text('pnc__for_ch2', 65535)->nullable();
			$table->string('pnc__for_ch2__if_2_b', 20)->nullable();
			$table->string('pnc__for_ch2__if_2_g', 20)->nullable();
			$table->text('pnc__for_ch3', 65535)->nullable();
			$table->string('pnc__for_ch3__if_3_b', 20)->nullable();
			$table->string('pnc__for_ch3__if_3_g', 20)->nullable();
			$table->text('pnc__for_ch4', 65535)->nullable();
			$table->string('pnc__for_ch4__if_4', 20)->nullable();
			$table->string('pnc__for_ch4__if_4_b', 20)->nullable();
			$table->string('pnc__for_ch4__if_4_g', 20)->nullable();
			$table->text('pnc__for_ch4__tot_ch', 65535)->nullable();
			$table->string('pnc__birth_baby', 20)->nullable();
			$table->text('pnc__pnc_baby', 65535)->nullable();
			$table->text('measles', 65535)->nullable();
			$table->string('measles__age_baby', 20)->nullable();
			$table->text('measles__baby_sex', 65535)->nullable();
			$table->text('measles__meas_18', 65535)->nullable();
			$table->text('measles__meas', 65535)->nullable();
			$table->text('sensitization', 65535)->nullable();
			$table->text('sensitization__topic', 65535)->nullable();
			$table->text('sensitization__mnch', 65535)->nullable();
			$table->text('sensitization__which_pers', 65535)->nullable();
			$table->string('sensitization__hus_age', 20)->nullable();
			$table->text('sensitization__mil_ques', 65535)->nullable();
			$table->text('sensitization__mil_ques__mil_preg', 65535)->nullable();
			$table->string('sensitization__mil_ques__mil_age', 20)->nullable();
			$table->string('sensitization__fil_age', 20)->nullable();
			$table->string('sensitization__how_sis', 20)->nullable();
			$table->text('sensitization__sis_numb', 65535)->nullable();
			$table->text('sensitization__sis_numb__sis_preg', 65535)->nullable();
			$table->string('sensitization__sis_numb__sis_age', 20)->nullable();
			$table->string('sensitization__how_bro', 20)->nullable();
			$table->text('sensitization__bro_numb', 65535)->nullable();
			$table->string('sensitization__bro_numb__bro_age', 20)->nullable();
			$table->text('sensitization__oth_pers', 65535)->nullable();
			$table->string('sensitization__how_male', 20)->nullable();
			$table->text('sensitization__males', 65535)->nullable();
			$table->string('sensitization__males__age_male', 20)->nullable();
			$table->string('sensitization__how_female_oth', 20)->nullable();
			$table->text('sensitization__fem_numb', 65535)->nullable();
			$table->text('sensitization__fem_numb__oth_preg', 65535)->nullable();
			$table->string('sensitization__fem_numb__oth_fem_age', 20)->nullable();
			$table->text('sensitization__pers_topic', 65535)->nullable();
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
		Schema::drop('dw_submission015s');
	}

}
