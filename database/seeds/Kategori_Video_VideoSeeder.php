<?php

use Illuminate\Database\Seeder;

class Kategori_Video_VideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $videos =  App\Models\Video::get();

        App\Models\KategoriVideo::get()->each(function ($kategoriVideo) use ($videos){
            $kategoriVideo->videos()->attach(
                $videos->random(rand(1, 25))->pluck('id')->toArray()
            );
        });

    }
}
