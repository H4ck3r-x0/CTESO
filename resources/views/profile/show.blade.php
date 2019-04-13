@extends('layouts.master')
@section('body')
@section('title', 'Profile')

<div class="container">
  <div class="card">
    <h1 class="m-3">{{$user->name}}</h1>
    @if($user->created_at !== null)
    <small class="text-muted ml-3">Created at {{$user->created_at->format('m/d/Y')}}</small>
    @endif
    <div class="card-body">
      <p class="card-text">
        <h3>Recent Booked Flights</h3>
        @if($user->book->count() > 0)
          @foreach ($user->book as $flight)
            <div class="list-group">
              <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                  <h5 class="mb-1">{{$flight->adminFlight->from}} <img src="{{asset('icons/flight.png')}}" alt="-"> {{$flight->adminFlight->to}}</h5>
                  <small>{{$flight->created_at->format('m/d/Y')}}</small>
                </div>
                <small>
                  Airports:
                  {{$flight->adminFlight->departure_airport}}
                  -
                  {{$flight->adminFlight->arrival_airport}}
                </small>
              </a>
              <hr class="mt-1">
            </div>
          @endforeach
        @else
          <div class="alert alert-secondary" role="alert">
            You have no recent flights booked.
          </div>
        @endif
      </p>
    </div>
  </div>
</div>

@endsection
