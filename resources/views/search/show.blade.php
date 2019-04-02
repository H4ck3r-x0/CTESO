@extends('layouts.master')
@section('body')
@section('title', 'Flights')
<div class="container">
  @if(count($results) > 0)
    @foreach ($results as $result)
      <div class="card text-center">
        <div class="card-header bg-light">
          <h3>{{$result->from}} <img src="{{asset('icons/flight.png')}}" alt="-"> {{$result->to}}</h3>
        </div>
        <div class="card-body">
          <h5 class="card-title">
            Depart Time {{$result->depart_time}}
            <img src="{{asset('icons/clock.png')}}" alt="-">
            Arrival {{$result->arrival}}
          </h5>
          <a href="#" class="btn btn-primary">Book <span>&#8594;</span> ${{$result->price}}</a>
        </div>
        <div class="card-footer text-muted bg-light">
          Airports: Departure from {{$result->departure_airport}} Arrival to {{$result->arrival_airport}}
        </div>
      </div>
      <br>
  @endforeach
  @else
    <div class="alert alert-success">
        No flights are available. <a href="{{route('home')}}">Go back</a> to try again
    </div>
  @endif
</div>
@endsection
