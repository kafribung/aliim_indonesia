<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Artikel;
use Faker\Generator as Faker;

$factory->define(Artikel::class, function (Faker $faker) {
    return [
        Artikel::create([
            'title' => $faker->sentence(),
            'description' => $faker->paragraph(),
            'slug' => \Str::slug($faker->sentence()),
            'img'  => 'img_artikels/default_artikel.jpg',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ])
    ];
});
