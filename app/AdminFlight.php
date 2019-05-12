<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class AdminFlight extends Model
{
  public $table = "flights";

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'from', 'departure_airport', 'to', 'arrival_airport', 'return_date', 'depart', 'arrival', 'seats', 'price', 'created_by',
  ];

  public function user()
  {
    return $this->belongsTo(User::class, 'created_by');
  }


}
