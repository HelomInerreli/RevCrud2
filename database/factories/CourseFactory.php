<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'category' => $faker->randomElement(['Matemática', 'Ciências', 'História', 'Artes', 'Programação']),
        'price' => $faker->randomFloat(2, 100, 1000),
    ];
});
