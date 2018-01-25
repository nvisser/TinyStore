<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test registration
     *
     * @return void
     */
    public function testRegister()
    {
        $user = factory('App\User')->create();
        $data = [
            'name' => $user->name,
            'email' => 'a' . $user->email, // Why the a? For some reason even on an empty database there's duplicates
            'password' => $user->password,
        ];

        $this->post('/register', $data)
            ->seeJsonContains(['created' => true]);
    }

    /*
     * Test getting a token
     * This could use some mocking
     *
     * @return void
     */
//    public function testGetToken()
//    {
//        $user = factory('App\User')->create();
//
//        $this->post('/refreshtoken', [
//            'email' => $user->email,
//            'password' => $user->password,
//        ])->seeJsonContains(['token']);
//    }
}