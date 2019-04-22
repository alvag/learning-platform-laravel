<?php

/* @var $factory Factory */

use App\Role;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence
    ];
});
