<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScheduleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSchedulesTest()
    {
        $this->withExceptionHandling();

        $response = $this->getJson('/api/schedules');

        $response->assertStatus(200);
    }
}
