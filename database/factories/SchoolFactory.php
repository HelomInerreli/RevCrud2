<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\School;
use Faker\Generator as Faker;

$factory->define(School::class, function (Faker $faker) {
    return [
        'title' => $faker->company,
        'category' => $faker->randomElement(['Secundário', 'Fundamental', 'Faculdade']),
        'price' => $faker->randomFloat(2, 10000, 50000),
    ];
});
