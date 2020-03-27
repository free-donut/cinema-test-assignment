<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
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

$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'row' => $faker->unique(true)->numberBetween($min = 1, $max = 8),
        'seat' => $faker->unique(true)->numberBetween($min = 1, $max = 12),
        'price' => '300',
        'showtime_id' => 1,
        'order_id' => 1,
    ];
});
