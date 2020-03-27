<?php

use Illuminate\Database\Seeder;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Film::class, 20)->create();
    }

        /*factory(App\Film::class, 10)->create()->each(function ($film) {
        $user->showtimes()->save(factory(App\Showtime::class, 5)->make());*/
}
