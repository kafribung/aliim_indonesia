<?php

use App\Models\Artikel;
use App\Models\KategoriArtikel;
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
        // Attach Seeder Relation Many to Many 
        $artikels = Artikel::get();
        KategoriArtikel::get()->each(function ($kategoriArtikel) use ($artikels) { 
            $kategoriArtikel->artikels()->attach(
                $artikels->random(rand(1, 15))->pluck('id')->toArray()
            ); 
        });
    }
}
