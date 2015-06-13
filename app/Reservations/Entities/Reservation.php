<?php

namespace ThreeAccents\Reservations\Entities;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
   protected $fillable = ['first_name', 'last_name', 'phone_number', 'date', 'guests'];
}
