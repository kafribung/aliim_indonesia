<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'video' => 'https://www.youtube.com/embed/nMTCuOoZmRc',
        'description' => $faker->paragraph(),
        'slug'  => \Str::slug($faker->sentence()),
        'user_id' => 1,
    ];
});
