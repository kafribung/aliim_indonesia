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
        $kategoris = ['akidah', 'akhlak', 'manhaj', 'al-quran', 'fiqih & muamalah'];

        foreach ($kategoris as $kategori) {
            KategoriArtikel::create([
                'title' => $kategori,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
