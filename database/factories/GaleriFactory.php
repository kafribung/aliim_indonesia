<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Galeri;
use Faker\Generator as Faker;

$factory->define(Galeri::class, function (Faker $faker) {
    return [
        'img'     => 'img_galeris/default_galeri.jpg',
        'user_id' => 1,
    ];
});
