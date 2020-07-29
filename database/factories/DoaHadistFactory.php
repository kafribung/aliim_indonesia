<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DoaHadist;
use Faker\Generator as Faker;

$factory->define(DoaHadist::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'img'   => 'img_doa_hadists/default_doa.jpg',
        'slug'  => \Str::slug($faker->sentence()),
        'user_id' => 1,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
