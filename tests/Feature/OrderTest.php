<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Showtime;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testCreate()
    {
        $this->seed();
        $user = factory(User::class)->create();
        $showtime = factory(Showtime::class)->create();
        $showtime_id = $showtime->id;
        $response = $this->actingAs($user)->get(route('orders.create', compact('showtime_id')));
        $response->assertStatus(200);
    }

    public function testStore()
    {
        $this->seed();
        $user = factory(User::class)->create();
        $showtime = factory(Showtime::class)->create();
        $showtime_id = $showtime->id;
        $checkbox = ['1-1', '1-2'];
        $response = $this->actingAs($user)->withSession(compact('showtime_id'))->post(route('orders.store', compact('checkbox')));
        $response->assertStatus(302);
    }
}
