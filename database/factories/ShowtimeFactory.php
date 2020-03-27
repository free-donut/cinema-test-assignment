<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Showtime;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Showtime::class, function (Faker $faker) {
    return [
        'date' =>  new DateTime('today'),
        'time' => '07:00',
        'film_id' =>  rand(1, 10),
    ];
});
