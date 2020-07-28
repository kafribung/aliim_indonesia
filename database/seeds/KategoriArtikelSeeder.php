<?php

use App\Models\KategoriArtikel;
use Illuminate\Database\Seeder;

class KategoriArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoris = ['Akidah', 'Akhlak', 'Manhaj', 'Alquran', 'Fiqih & Muamalah'];

        foreach ($kategoris as $kategori) {
            KategoriArtikel::create([
                'title' => $kategori,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
