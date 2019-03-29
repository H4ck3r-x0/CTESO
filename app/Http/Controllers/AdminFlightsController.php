<?php

namespace App\Http\Controllers;

use App\AdminFlight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
         'from' => 'required|string|max:255',
         'to' => 'required|string|max:255',
         'depart_date' => 'required|string|max:255',
         'depart_time' => 'required|string|max:255',
         'arrival' => 'required|string|max:255',
         'seats' => 'required|string|max:255',
         'price' => 'required|string|max:255',
         'created_by' => 'required',
     ]);


     if ($validator->fails())
      {
        return redirect('admin/add_flight')
                ->withErrors($validator)
                ->withInput();
      }

      //dump($request->all());

      $flight = new AdminFlight();
      $flight->from = $request->input('from');
      $flight->to = $request->input('to');
      $flight->depart_date = $request->input('depart_date');
      $flight->depart_time = $request->input('depart_time');
      $flight->arrival = $request->input('arrival');
      $flight->seats = $request->input('seats');
      $flight->price = $request->input('price');
      $flight->created_by = $request->input('created_by');

      // Generate Flight number
      $from = $flight->from;
      $flight_name = substr($from, 0, 2);
      $random_number =  rand(10, 20);
      $flight->flight_number = $flight_name . '-' . $random_number;

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
        $flight->to = $request->input('to');
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
