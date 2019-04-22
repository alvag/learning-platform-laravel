<?php

/* @var $factory Factory */

use App\Category;
use App\Course;
use App\Level;
use App\Teacher;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use \Faker\Provider\Image;

$factory->define(Course::class, function (Faker $faker) {
    $name = $faker->sentence;
    $status = $faker->randomElement([Course::PUBLISHED, Course::PENDING, Course::REJECTED]);

    return [
        'name' => $name,
        'slug' => Str::slug($name, '-'),
        'description' => $faker->paragraph,
        'picture' => Image::image(storage_path().'/app/public/courses', 600, 350, 'business', false),
        'status' => $status,
        'previous_approved' => $status !== Course::PUBLISHED ? false : true,
        'previous_rejected' => $status !== Course::REJECTED ? true : false,
        'teacher_id' => Teacher::all()->random()->id,
        'category_id' => Category::all()->random()->id,
        'level_id' => Level::all()->random()->id,
    ];
});
