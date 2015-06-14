<?php

$router->group(['prefix' => '/api/v1'], function($router){
    $router->post('/reservations', ['uses' => 'Reservations\Http\Controllers\ReservationController@store']);
    $router->get('/reservations', ['uses' => 'Reservations\Http\Controllers\ReservationController@index']);
});
