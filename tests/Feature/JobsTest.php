<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Job;

class JobsTest extends TestCase
{
    /** @test */
    public function the_jobs_show_route_can_be_accesed(){
        // $this->withoutExceptionHandling();

        // Arrange
        // Dodajemy do bazy wpis

        $job = Job::create([
            'name' => 'Billboard Arhelanu',
        ]);

        // Act
        // Wykonujemy zapytanie pod adres wpisu

        $response = $this->get('/jobs/'. $job->id);

        // Assert
        // Sprawdzamy czy w odpowiedzi znajduje się nazwa pracy

        $response->assertStatus(200)->assertSeeText('Billboard Arhelanu');
    }
}
