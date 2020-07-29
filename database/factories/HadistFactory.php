<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Hadist;
use Faker\Generator as Faker;

$factory->define(Hadist::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'info'  => 'Periwayat',
        'description' => $faker->paragraph(),
    ];
});
