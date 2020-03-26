<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Film;
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

$factory->define(Film::class, function (Faker $faker) {
    return [
        'name' => $faker->realText($maxNbChars = 20, $indexSize = 1) ,
        'genre' => $faker->randomElement($array = array ('Action', 'Adventure', 'Animation', 'Biography', 'Comedy', 'Crime', 'Documentary', 'Drama', 'Family', 'Fantasy', 'History', 'Horror', 'Musical', 'Mystery', 'Superhero', 'Thriller', 'Western')),
        'duration' => $faker->numberBetween($min = 90, $max = 200),
        'year' => $faker->year($max = 'now'),
        'director' => $faker->name,
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2) ,
    ];
});
