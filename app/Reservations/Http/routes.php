<?php

$router->group(['prefix' => '/api/v1'], function($router){
    $router->post('/reservations', ['uses' => 'Reservations\Http\Controllers\ReservationController@store']);
    $router->get('/reservations', ['middleware' => ['jwt.auth', 'is_admin'], 'uses' => 'Reservations\Http\Controllers\ReservationController@index']);
});
