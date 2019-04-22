<?php

/* @var $factory Factory */

use App\Teacher;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Teacher::class, function (Faker $faker) {
    return [
        'user_id'     => null,
        'title'       => $faker->jobTitle,
        'biography'   => $faker->paragraph,
        'website_url' => $faker->url
    ];
});
