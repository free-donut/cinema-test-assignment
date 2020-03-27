<?php

use Illuminate\Database\Seeder;

class ShowtimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $begin = new DateTime('today');
        $end = clone $begin;
        $end->modify('+ 7 days');
        $interval = new DateInterval('P1D');
        $daterange = new DatePeriod($begin, $interval, $end);
        $dates = array_map(function($date) {
            return $date->format("Y-m-d");
        }, iterator_to_array($daterange)); 

        $times = ['07:00', '11:00', '15:00', '19:00', '23:00'];
        foreach ($dates as $date) {
            foreach ($times as $time) {
                factory(App\Showtime::class)->create([
                    'date' => $date,
                    'time' => $time,
                ]);
            }
        }
    }
}
