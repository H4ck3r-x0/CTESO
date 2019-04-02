<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\AdminFlight;
use Carbon\Carbon;

use Session;

class searchFlightsController extends Controller
{
    public function flights(Request $request, AdminFlight $flights)
    {

      // Validate the search form inputs.
      $validator = Validator::make($request->all(), [
         'from' => 'required|string|max:255',
         'to' => 'required|string|max:255',
         'depart_date' => 'required|string|max:255',
      ]);

     // check if the form is vaild.
     if ($validator->fails())
      {
        return redirect('/')
                ->withErrors($validator)
                ->withInput();
      }

      // search the database for flights.
      // get the request inputs,
      $from = $request->input('from');
      $to = $request->input('to');
      $depart_date = $request->input('depart_date');
      $results = $flights->where('from', $from)
                         ->where('to', $to)
                         ->where('depart_date', $depart_date)
                         ->get();

      return view('search.show')->with('results', $results);

    }



}
