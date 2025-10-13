<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Teacher;
use Faker\Generator as Faker;

$factory->define(Teacher::class, function (Faker $faker) {
    return [
        'school_id' => random_int(1, 4),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'hire_date' => $faker->date()
    ];
});
