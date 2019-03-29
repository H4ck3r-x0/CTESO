@extends('layouts.master')
@section('body')

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
          <p class="card-text">Write any information here ...</p>
          <a href="#" class="btn btn-primary">${{$result->price}}</a>
        </div>
        <div class="card-footer text-muted bg-light">
          From <b>{{$result->from}}</b> airport To <b>{{$result->to}}</b> airport.
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
