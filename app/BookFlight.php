<?php

namespace App;

use App\User;
use App\AdminFlight;
use Illuminate\Database\Eloquent\Model;

class BookFlight extends Model
{
    public $table = "booked_flights";


    public function adminFlight()
    {
      return $this->belongsTo(AdminFlight::class, 'flight_id');
    }


    public function user()
    {
      return $this->belongsTo(User::class, 'user_id');
    }
}
