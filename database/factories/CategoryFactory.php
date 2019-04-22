<?php

/* @var $factory Factory */

use App\Category;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['PHP', 'JAVA', 'JAVASCRIPT', 'DISEÑO WEB', 'SERVIDORES', 'MYSQL', 'NOSQL', 'BIGDATA', 'AMAZON WEB SERVICES']),
        'description' => $faker->sentence
    ];
});
