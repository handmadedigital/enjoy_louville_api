<?php

namespace ThreeAccents\Reservations\Http\Requests;

use ThreeAccents\Core\Http\Requests\Request;

class StoreReservationRequest extends Request
{
        public function rules()
        {
            return [
                'first_name' => 'required_if:is_guest,true',
                'last_name' => 'required_if:is_guest,true',
                'phone_number' => 'required_if:is_guest,true',
                'date' => 'required',
                'guests' => 'required|integer',
                'is_guest' => 'required|boolean',
                'user_id' => 'required|integer'
            ];
        }

    public function authorize()
    {
        return true;
    }
}