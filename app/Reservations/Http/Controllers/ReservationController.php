<?php

namespace ThreeAccents\Reservations\Http\Controllers;

use ThreeAccents\Core\Http\Controllers\ApiController;
use ThreeAccents\Reservations\Entities\Reservation;
use ThreeAccents\Reservations\Http\Requests\StoreReservationRequest;
use ThreeAccents\Reservations\Http\Transformers\ReservationTransformer;

class ReservationController extends ApiController
{
    public function index()
    {
        $reservations = Reservation::latest()->get();

        return $this->respondWithCollection($reservations, new ReservationTransformer);
    }

    public function store(StoreReservationRequest $request)
    {
        Reservation::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'date' => $request->date,
            'guests' => $request->guests,
        ]);

        return $this->respondWithArray([
            'message' => 'reservation was made'
        ]);
    }
}