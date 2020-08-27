<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Job;

class JobsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function the_jobs_show_route_can_be_accesed(){
        // $this->withoutExceptionHandling();

        // Arrange
        // Dodajemy do bazy wpis

        $job = factory(Job::class)->create([
            'name' => 'Billboard Arhelanu',
        ]);

        // Act
        // Wykonujemy zapytanie pod adres wpisu

        $response = $this->get('/jobs/'. $job->id);

        // Assert
        // Sprawdzamy czy w odpowiedzi znajduje się nazwa pracy

        $response->assertStatus(200)->assertSeeText('Billboard Arhelanu');
    }

    /** @test */
    public function the_discription_attribute_is_shown_on_the_jobs_show_view(){
        $job = factory(Job::class)->create([
            'discription' => 'Billboard standard obok biura'
        ]);

        $response = $this->get('/jobs/' . $job ->id);

        $response->assertSeeText('Billboard standard obok biura');
    }
}
