<?php

/* @var $factory Factory */

use App\Student;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'user_id' => null,
        'title' => $faker->jobTitle
    ];
});
