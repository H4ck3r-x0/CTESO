<?php

namespace App\Http\Controllers;

use App\AdminFlight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreFlightsRequest;

class adminFlightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminFlight $adminFlight)
    {
      $flights = $adminFlight->with('user')->get();
      return view('admin.flights.show')->with('flights', $flights);
    }


    public function add_flight()
    {
      return view('admin.flights.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFlightsRequest $request)
    {

      // validate the request ..
      $validated = $request->validated();

      // get the requests.
      $flight = new AdminFlight();
      $flight->from = $request->input('from');
      $flight->departure_airport = $request->input('departure_airport');
      $flight->to = $request->input('to');
      $flight->arrival_airport = $request->input('arrival_airport');
      $flight->depart_date = $request->input('depart_date');
      $flight->depart_time = $request->input('depart_time');
      $flight->arrival = $request->input('arrival');
      $flight->return_date = $request->input('return_date');
      $flight->seats = $request->input('seats');
      $flight->price = $request->input('price');
      $flight->created_by = $request->input('created_by');

      // Generate Flight number
      $from = $flight->from;
      $flight_name = substr($from, 0, 2);
      $random_number =  rand(10, 20);
      $flight->flight_number = $flight_name . '-' . $random_number;

      // save the flight to the database and redirect back.
      $flight->save();
      return redirect()->route('add_flight')->with('status', 'Flight saved!');;

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminFlight  $adminFlight
     * @return \Illuminate\Http\Response
     */
    public function edit(adminFlight $adminFlight, $id)
    {
        $flight = $adminFlight->with('user')->find($id);
        return view('admin.flights.edit')->with('flight', $flight);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminFlight  $adminFlight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, adminFlight $adminFlight, $id)
    {
        $flight =  $adminFlight->find($id);
        $flight->from = $request->input('from');
        $flight->departure_airport = $request->input('departure_airport');
        $flight->to = $request->input('to');
        $flight->arrival_airport = $request->input('arrival_airport');
        $flight->depart_date = $request->input('depart_date');
        $flight->depart_time = $request->input('depart_time');
        $flight->arrival = $request->input('arrival');
        $flight->seats = $request->input('seats');
        $flight->price = $request->input('price');
        $flight->save();

        return redirect()->route('edit_flight', $id)->with('status', 'Flight Updated!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminFlight  $adminFlight
     * @return \Illuminate\Http\Response
     */
    public function destroy(adminFlight $adminFlight, $id)
    {
        $flight = $adminFlight->find($id);

        $flight->delete();

        return redirect()->route('show_flights');
    }
}
