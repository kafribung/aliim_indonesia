<?php

use App\Models\{Artikel, KategoriArtikel};
use Illuminate\Database\Seeder;

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
                $artikels->random(rand(1, 5))->pluck('id')->toArray()
            ); 
        });
    }
}
