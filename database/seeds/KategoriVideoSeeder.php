<?php

use App\Models\KategoriVideo;
use Illuminate\Database\Seeder;

class KategoriVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategoris = ['Sholat', 'Puasa', 'Al-Quran', 'Thaharah', 'Haji'];

        for ($i = 0; $i < count($kategoris); $i++) {
            KategoriVideo::create([
                'title' => $kategoris[$i],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}