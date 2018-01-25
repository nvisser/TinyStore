<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('items', ['as' => 'items.index', 'uses' => 'ItemController@index']);
$router->get('items/{id:\d+}', ['as' => 'items.show', 'uses' => 'ItemController@show']);
$router->post('items', [
    'middleware' => 'auth',
    'as' => 'items.store',
    'uses' => 'ItemController@store'
]);

$router->post('register', ['as'=> 'users.register', 'uses' => 'UserController@register']);
$router->post('refreshtoken', ['as'=> 'users.refreshtoken', 'uses' => 'UserController@refreshToken']);
