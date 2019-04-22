<?php

/* @var $factory Factory */

use App\Level;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Level::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence
    ];
});
