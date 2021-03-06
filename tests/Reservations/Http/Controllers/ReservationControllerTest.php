<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReservationControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_reserves_an_event_for_guest()
    {
        $this->post('api/v1/reservations', [
            'first_name' => 'rodrigo',
            'last_name' => 'lessa',
            'phone_number' => '9543030759',
            'date' => '2015-06-18',
            'guests' => 5,
            'is_guest' => true,
            'user_id' => 1
        ])
            ->seeJson()
            ->seeStatusCode(200)
            ->seeInDatabase('reservations', [
                'first_name' => 'rodrigo',
                'last_name' => 'lessa',
                'phone_number' => '9543030759',
                'date' => '2015-06-18',
                'guests' => 5,
                'is_guest' => true,
                'user_id' => 1
            ]);
    }

    /** @test */
    public function it_reserves_an_event_for_logged_in_user()
    {
        $this->post('api/v1/reservations', [
            'first_name' => null,
            'last_name' => null,
            'phone_number' => null,
            'date' => '2015-06-18',
            'guests' => 5,
            'is_guest' => false,
            'user_id' => 4
        ])
            ->seeJson()
            ->seeStatusCode(200)
            ->seeInDatabase('reservations', [
                'first_name' => null,
                'last_name' => null,
                'phone_number' => null,
                'date' => '2015-06-18',
                'guests' => 5,
                'is_guest' => false,
                'user_id' => 4
            ]);
    }

    /** @test */
    public function it_does_not_get_all_reservations_if_user_is_not_admin()
    {
        $this->get('/api/v1/reservations')
             ->seeJson()
             ->seeStatusCode(400);
    }
}