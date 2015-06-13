<?php

namespace ThreeAccents\Reservations\Http\Transformers;

use League\Fractal\TransformerAbstract;
use ThreeAccents\Reservations\Entities\Reservation;

class ReservationTransformer extends TransformerAbstract
{
    public function transform(Reservation $reservation)
    {
        return [
            'id' => (int) $reservation->id,
            'first_name' => $reservation->first_name,
            'last_name' => $reservation->last_name,
            'phone_number' => (int) $reservation->phone_number,
            'date' => $reservation->date,
            'guests' => (int) $reservation->guests,
        ];

    }
}