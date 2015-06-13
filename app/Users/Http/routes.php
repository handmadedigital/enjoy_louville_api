<?php

$router->group(['prefix' => 'api/v1'], function($router){
    $router->post('users', ['uses' => 'Users\Http\Controllers\AuthController@postRegister']);
});