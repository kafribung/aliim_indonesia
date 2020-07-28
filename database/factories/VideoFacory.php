<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
    return [
        Video::create([
            'title' => $faker->sentence(),
            'video' => 'https://www.youtube.com/embed/ucV7ynY4M8A',
            'description' => $faker->paragraph(),
            'slug'  => \Str::slug($faker->sentence()),
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ])
    ];
});
