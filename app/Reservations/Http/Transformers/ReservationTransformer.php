<?php

namespace ThreeAccents\Reservations\Http\Transformers;

use League\Fractal\TransformerAbstract;
use ThreeAccents\Reservations\Entities\Reservation;

class ReservationTransformer extends TransformerAbstract
{
    public function transform(Reservation $reservation)
    {
        if($reservation->is_guest) return $this->getGuestReservation($reservation);

        return $this->getUserReservation($reservation);
    }

    /**
     * @param Reservation $reservation
     * @return array
     */
    protected function getGuestReservation(Reservation $reservation)
    {
        return [
            'id' => (int)$reservation->id,
            'first_name' => $reservation->first_name,
            'last_name' => $reservation->last_name,
            'phone_number' => (int)$reservation->phone_number,
            'date' => $reservation->date,
            'guests' => (int)$reservation->guests,
            'is_guest' => true,
        ];
    }

    /**
     * @param Reservation $reservation
     * @return array
     */
    protected function getUserReservation(Reservation $reservation)
    {
        return [
            'id' => (int)$reservation->id,
            'first_name' => $reservation->user->first_name,
            'last_name' => $reservation->user->last_name,
            'phone_number' => (int)$reservation->user->phone_number,
            'date' => $reservation->date,
            'guests' => (int)$reservation->guests,
            'is_guest' => false,
        ];
    }
}