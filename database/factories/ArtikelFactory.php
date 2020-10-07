<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Artikel;
use Faker\Generator as Faker;

$factory->define(Artikel::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(20),
        'slug' => \Str::slug($faker->sentence()),
        'img'  => 'img_artikels/default_artikel.jpg',
        'user_id' => 1,
    ];
});
