<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => $faker->password(8),
    ];
});

$factory->defineAs('App\User', 'tokenuser', function ($faker) use ($factory) {
    $user = $factory->raw('App\User');

    return array_merge($user, ['token' => \App\Helpers\StringHelper::getRandom()]);
});

$factory->define(App\Item::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween(1,5000),
    ];
});
