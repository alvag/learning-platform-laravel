<?php

/* @var $factory Factory */

use App\Course;
use App\Requirement;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Requirement::class, function (Faker $faker) {
    return [
        'course_id' => Course::all()->random()->id,
        'requirement' => $faker->sentence
    ];
});
