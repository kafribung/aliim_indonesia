<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KategoriArtikelSeeder::class);
        $this->call(KategoriVideoSeeder::class);
    }
}
