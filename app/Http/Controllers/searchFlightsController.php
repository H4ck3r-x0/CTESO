<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests\FlightSearchFormRequest;
use App\AdminFlight;
use Session;

class searchFlightsController extends Controller
{
    public function flights(FlightSearchFormRequest $request, AdminFlight $flights)
    {
      
      // Validate the search form inputs.
      $validated = $request->validated();

      // search the database for flights.
      // get the request inputs,
      $from = $request->input('from');
      $to   = $request->input('to');
      $depart_date = $request->input('depart_date');
      $results = $flights->where('from', $from)
                         ->where('to', $to)
                         ->where('depart_date', $depart_date)
                         ->get();

      return view('search.show')->with('results', $results);

    }



}
