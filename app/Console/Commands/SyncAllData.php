<?php

namespace App\Console\Commands;

ini_set('memory_limit','256M');

use Illuminate\Console\Command;

use Hni\Dwsync\Models\DwProject;

class SyncAllData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Resync all data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
    	$this->info('Starting');
		$dwProject = DwProject::find(1);
		if ($dwProject) {
			$dwProject->initAbstractAttributes();
            $dwProject->setStartDate('01-11-2017 00:00:01');
			$resp = $dwProject->sync();
		}
		$dwProject = DwProject::find(2);
		if ($dwProject) {
			$dwProject->initAbstractAttributes();
            $dwProject->setStartDate('01-11-2017 00:00:01');
			$resp = $dwProject->sync();
		}
		$dwProject = DwProject::find(3);
		if ($dwProject) {
			$dwProject->initAbstractAttributes();
            $dwProject->setStartDate('01-11-2017 00:00:01');
			$resp = $dwProject->sync();
		}
    	$this->info('Finished sync');
    }
}
