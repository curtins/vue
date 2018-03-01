<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Traits\ProcessFile;

class ClearData extends Command
{
    

     use ProcessFile;

     /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rss:cleardailydata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear Daily Data';

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
        $this->ClearDailyData();
    }
}
