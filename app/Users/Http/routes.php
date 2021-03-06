<?php

$router->group(['prefix' => 'api/v1'], function($router){

    $router->get('users/{user_id}', ['uses' => 'Users\Http\Controllers\UserController@getUser']);


    $router->post('users', ['uses' => 'Users\Http\Controllers\AuthController@postRegister']);
    $router->post('authenticate', ['uses' => 'Users\Http\Controllers\AuthController@authenticate']);
    $router->post('/refresh-token', ['uses' => 'Users\Http\Controllers\AuthController@refreshToken']);
});