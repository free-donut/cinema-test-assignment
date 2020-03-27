<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class HomeTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testIndex()
    {
        $response = $this->get(route('home'));
        $response->assertStatus(302);
    }

    public function testHomePage()
    {
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get(route('homePage'));
        $response->assertStatus(200);
    }
}
