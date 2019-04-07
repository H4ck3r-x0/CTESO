@extends('layouts.master')
@section('body')
@section('title', 'Flight Options')
<div class="container">
      <div class="card text-center">
        <div class="card-header bg-light">
          <h3>Flight Options</h3>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('flight_options') }}">
            @csrf
            <h5 class="card-title">Select how many travellers.</h5>
            <div class="form-group">
              <label for="travellers">Travellers</label>
              <select class="form-control form-control-md" id="travellers" name="travellers">
                <option value="1">1 Traveller</option>
                <option value="2">2 Travellers</option>
                <option value="3">3 Travellers</option>
                <option value="4">4 Travellers</option>
                <option value="5">5 Travellers</option>
              </select>
            </div>
            <div class="form-group">
              <h5 class="card-title">Check your options.</h5>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="meal" id="meal" value="1">
                <label class="form-check-label" for="meal">Meal will cost you $50.</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="seat" id="seat" value="1">
                <label class="form-check-label" for="seat">Seat next to the window? if available.</label>
              </div>
            </div>
            <input type="hidden" name="flight_id" value="{{$flight->id}}">
            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
            <br>
            <div class="form-group row mb-0">
                <div class="col">
                  <button type="submit" class="btn btn-primary">Proceed</button>
                </div>
            </div>
          </form>
        </div>
        <div class="card-footer text-muted bg-light">
        </div>
      </div>
      <br>
</div>
@endsection
