<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 35; $i++) {
            $order = factory(App\Order::class)->make();
            $order->tickets()->createMany(
                factory(App\Ticket::class, 5)->make([
                    'showtime_id' => $i,
                ])->toArray()
            );
        }
    }
}
