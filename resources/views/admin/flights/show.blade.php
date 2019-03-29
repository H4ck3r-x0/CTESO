@extends('layouts.master')

@section('title', 'Admin Page - Show Flights')

@section('body')

<div class="container">
    @include('admin.includes.tabs')
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header bg-white">{{ __('Show Flights') }}</div>
                  <div class="card-body">
                  @if( $flights->count() != 0)
                    <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Depart Date</th>
                        <th scope="col">Depart Time</th>
                        <th scope="col">Arrival</th>
                        <th scope="col">Seats</th>
                        <th scope="col">Price</th>
                        <th scope="col">Created By</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($flights as $flight)
                      <tr>
                        <th scope="row">{{$flight->id}}</th>
                        <td>{{$flight->from}}</td>
                        <td>{{$flight->to}}</td>
                        <td>{{$flight->depart_date}}</td>
                        <td>{{$flight->depart_time}}</td>
                        <td>{{$flight->arrival}}</td>
                        <td>{{$flight->seats}}</td>
                        <td>{{$flight->price}}</td>
                        <td>{{$flight->user->name}}</td>
                        <td>
                          <a href="{{route('edit_flight', [$flight->id])}}">
                            <button type="button" class="btn btn-info">Edit</button>
                          </a>
                        </td>
                        <td>
                          <a href="{{route('delete_flight', [$flight->id])}}">
                            <button type="button" class="btn btn-danger">Delete</button>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                @else

                  <div class="alert alert-info" role="alert">
                    There are no flights to show, please add flights.
                  </div>

@endif
                  </div>
              </div>
          </div>
      </div>
</div>
@endsection
