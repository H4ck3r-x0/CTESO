<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AdminFlight;
use App\BookFlight;
use Redirect;
use Str;

class BookFlightsController extends Controller
{


    public function index(Request $request, AdminFlight $adminFlight)
    {
      $flight_id = $request->input('flight_id');
      $flight = $adminFlight->where('id', $flight_id)->first();
      return view('book.flight_options')->with('flight', $flight);
    }

    public function flight_options(Request $request, AdminFlight $adminFlight, BookFlight $book)
    {
      $meal_price = 50; // meal price is fixed price.
      $travellers = $request->input('travellers');
      $meal = $request->input('meal');
      $seat = $request->input('seat');
      $flight_id = $request->input('flight_id');
      $user_id = $request->input('user_id');

      // get the flight details.
      $flight = $adminFlight->where('id', $flight_id)->first();
      // check if the travellers more than one..
      if($travellers > 1)
      {
        $price = $flight->price * $travellers;

      } else {
        $price = $flight->price;
      }

      // check if the meal is set
      if($meal !== null)
      {
        // check if the travellers more than 1 and they add meals to their flight.
        if($travellers > 1)
        {
          $meal_price = $meal_price * $travellers;
        }
        $price = $price + $meal_price;
      }

      // check if the next to the window is set
      if($seat !== null)
      {
        // Generate random seat number
        $letter = chr(rand(65,90));
        $random_number =  rand(1, 30);
        $seat = $letter.$random_number;
        $book->seat = $seat;

      } else {
        // Generate random seat number
        $letter = chr(rand(65,90));
        $random_number =  rand(1, 30);
        $seat = $letter.$random_number;
        $book->seat = $seat;
      }

      $book->travellers = $travellers;
      $book->meal = $meal;
      $book->price = $price;
      $book->seat = $seat;
      $book->user_id = $request->input('user_id');
      $book->flight_id = $request->input('flight_id');
      $book->save();
      // updating the flights seats count.
      $flight->decrement('seats');
      $flight->save();

      return redirect::route('payment', $book->id);

    }

    public function payment(BookFlight $book, $booked_id)
    {
      $flight = $book->with(['user', 'adminFlight'])->where('id', $booked_id)->first();
      return view('book.payment')->with('flight', $flight);
    }

    public function confirmation(BookFlight $book, Request $request)
    {
      // get the flight details.
      $flight_id = $request->input('flight_id');
      $flight = $book->with(['user', 'adminFlight'])->where('id', $flight_id)->first();
      // generate a ticket number ..
      $flight->ticket_number = '#'. rand(1, 1000000);
      $flight->save();
      return view('book.ticket')->with('flight', $flight);
    }
}
