<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call('UsersTableSeeder');
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        factory('App\User')->create([
            'api_token' => 'devtoken',
        ]);
    }
}