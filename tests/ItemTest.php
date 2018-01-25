<?php

use Laravel\Lumen\Testing\DatabaseTransactions;

class ItemTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test item creation
     *
     * @return void
     */
    public function testItemCreateSuccess()
    {
        $user = factory('App\User')->create();
        $data = ['name' => 'Chocolate bar', 'price' => 99];

        $this->actingAs($user)
            ->post('/items', $data)
            ->seeJsonContains(array_merge(['created' => true], $data));
    }

    /**
     * This will fail because authentication is required
     *
     * @return void
     */
    public function testItemCreateUnauth()
    {
        $data = ['name' => 'Chocolate bar', 'price' => 99];

        // 401 Unauthorized
        $this->post('/items', $data)
            ->seeStatusCode(401);
    }
}