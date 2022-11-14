<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AppointmentTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAppointmentsTest()
    {
        $this->withExceptionHandling();

        $response = $this->postJson('/api/appointments',[
            'slot_id'   => 1,
            'first_name'=> 'Bilal',
            'last_name' => 'Ali',
            'email'     => 'bilalali0002@gmail.com',
            'number_of_persons'=> 1
        ]);

        $response->assertStatus(200);
    }
}
