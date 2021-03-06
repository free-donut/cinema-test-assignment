<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Film;

class FilmTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->seed();
        $response = $this->get(route('films.index'));
        $response->assertStatus(200);
    }

    public function testShow()
    {
        $film = factory(Film::class)->create();
        $response = $this->get(route('films.show', ['id' => $film->id]));
        $response->assertStatus(200);
    }
}
