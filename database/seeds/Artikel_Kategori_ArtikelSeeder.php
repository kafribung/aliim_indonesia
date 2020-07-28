<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Artikel_Kategori_ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('artikel_kategori_artikel')->insert([
                'artikel_id' => rand(3, 26),
                'kategori_artikel_id' => rand(1, 5),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
