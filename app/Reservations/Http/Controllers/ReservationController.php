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
        if($request->is_guest === true)
        {
            Reservation::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'date' => $request->date,
                'guests' => $request->guests,
                'is_guest' => true,
                'user_id' => $request->user_id,
            ]);
        }
        else
        {
            Reservation::create([
                'first_name' => null,
                'last_name' => null,
                'phone_number' => null,
                'user_id' => $request->user_id,
                'date' => $request->date,
                'guests' => $request->guests,
                'is_guest' => false,
            ]);
        }


        return $this->respondWithArray([
            'message' => 'reservation was made'
        ]);
    }
}