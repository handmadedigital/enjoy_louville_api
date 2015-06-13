<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthControllerTest  extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_registers_user()
    {
        $this->post('api/v1/users', [
            'username' => 'test user',
            'password' => 'testpass',
            'first_name' => 'peter',
            'last_name' => 'griffin',
            'email' => 'peter@griffin.com'
        ])
        ->seeJson()
        ->seeStatusCode(200)
        ->seeInDatabase('users', [
            'username' => 'test user',
            'first_name' => 'peter',
            'last_name' => 'griffin',
            'email' => 'peter@griffin.com'
        ]);
    }
}