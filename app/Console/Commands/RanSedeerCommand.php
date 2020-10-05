<?php

namespace App\Console\Commands;

use KategoriVideoSeeder;
use KategoriArtikelSeeder;
use Illuminate\Console\Command;

class RanSedeerCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kafri:bung';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Seeder and Migrate Database';

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
        $this->info('---Start---');
        $this->call(KategoriArtikelSeeder::class);
        $this->call(KategoriVideoSeeder::class);
        $this->line('---Finish---');
    }
}
