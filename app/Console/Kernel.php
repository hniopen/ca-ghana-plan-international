<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Hni\Dwsync\Models\DwProject;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
		Commands\SyncAllData::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
	          
		$schedule->call(function () {
			//query with the last submitted at date for each as the start date and todays date plus 2 days as the end date if start and end are not specified.
			print("running scheduled task");
			$dwProject = DwProject::find(1);
			if ($dwProject) {
				$dwProject->initAbstractAttributes();
				$resp = $dwProject->sync();
				var_export($resp);
			}
			$dwProject = DwProject::find(2);
			if ($dwProject) {
				$dwProject->initAbstractAttributes();
				$resp = $dwProject->sync();
				var_export($resp);
			}
			$dwProject = DwProject::find(3);
			if ($dwProject) {
				$dwProject->initAbstractAttributes();
				$resp = $dwProject->sync();
				var_export($resp);
			}
		})->monthlyOn(11, '02:00');
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
