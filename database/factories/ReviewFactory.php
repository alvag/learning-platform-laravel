<?php

/* @var $factory Factory */

use App\Course;
use App\Review;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'course_id' => Course::all()->random()->id,
        'rating' => $faker->randomFloat(2, 1,5)
    ];
});
