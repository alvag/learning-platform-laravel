<?php

/* @var $factory Factory */

use App\Course;
use App\Goal;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Goal::class, function (Faker $faker) {
    return [
        'course_id' => Course::all()->random()->id,
        'goal' => $faker->sentence
    ];
});
