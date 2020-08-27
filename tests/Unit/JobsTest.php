<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Job;
use Carbon\Carbon;


class JobsTest extends TestCase
{
    /** @test */
    public function if_the_accomplished_at_is_null_the_post_is_not_accomplished(){
        $job = factory(Job::class)->create([
            'accomplished_at' => null,
        ]);

        $jobs = Job::accomplished()->get();

        $this->assertFalse($jobs->contains($job));
    }

    /** @test */
    public function if_the_accomplished_at_is_in_the_future_the_job_is_not_accomplished(){
        $job = factory(Job::class)->create([
            'accomplished_at' => Carbon::tomorrow(),
        ]);

        $jobs = Job::accomplished()->get();

        $this->assertFalse($jobs->contains($job));
    }

    /** @test */
    public function if_the_accomplished_at_is_in_the_past_the_job_is_accomplished(){
        $job = factory(Job::class)->create([
            'accomplished_at' => Carbon::yesterday(),
        ]);

        $jobs = Job::accomplished()->get();

        $this->assertTrue($jobs->contains($job));
    }

    /** @test */
    public function if_the_accomplished_is_now_job_is_accomplished(){
        $job = factory(Job::class)->create([
            'accomplished_at' => Carbon::now(),
        ]);

        $jobs = Job::accomplished()->get();

        $this->assertTrue($jobs->contains($job));
    }
}
