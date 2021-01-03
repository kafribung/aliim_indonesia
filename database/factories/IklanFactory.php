<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Iklan;
use Faker\Generator as Faker;

$factory->define(Iklan::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'owner' => $faker->name(),
        'img'   => 'img_iklans/default_iklan.jpg',
        'wa'    => '08331459400',
        'link'  => $faker->url()
    ];
});
