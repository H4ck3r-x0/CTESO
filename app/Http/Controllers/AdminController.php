<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BookFlight;


class AdminController extends Controller
{
    public function index()
    {
      $booked_flights = BookFlight::with('user.book', 'adminFlight')->get();
      return view('admin.index')->with('booked_flights', $booked_flights);
    }
}
