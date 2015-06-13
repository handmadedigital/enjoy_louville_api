<?php

namespace ThreeAccents\Reservations\Http\Requests;

use ThreeAccents\Core\Http\Requests\Request;

class StoreReservationRequest extends Request
{
        public function rules()
        {
            return [
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'required',
                'date' => 'required',
                'guests' => 'required',
            ];
        }

    public function authorize()
    {
        return true;
    }
}