<?php

namespace App\Console\Commands;

use Config;
use Artisan;
use Illuminate\Console\Command;

class MigrateTestingDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:testing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate the testing database';

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
        Config::set('database.default', 'testing');

        Artisan::call('migrate');

        Config::set('database.default', 'local');

        $this->info('Migrated the test database, sir! You are good to go! :)');
    }
}
