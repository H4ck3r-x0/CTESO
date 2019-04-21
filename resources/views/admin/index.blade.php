@extends('layouts.master')
@section('title', 'Admin Page')
@section('body')
  <div class="container">
      @include('admin.includes.tabs')
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header bg-white">{{ __('Admin Panel') }}</div>
                  <div class="card-body">
                    <p>
                      Welcome, <b>{{Auth::user()->name}}</b> to {{config('app.name')}} admin panel.
                    </p>
                    <p class="card-text">
                      <h3>Recent Booked Flights</h3>
                      @if($booked_flights->count() > 0)
                        @foreach ($booked_flights as $booked)
                          <div class="row ml-1">
                            <div class="list-group col-md-8">
                              <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                  <h5 class="mb-1">
                                    {{$booked->user->name}}
                                  </h5>

                                  <small>{{$booked->created_at->format('d/m/Y')}}</small>
                                </div>

                              </a>
                            </div>
                            <div class="col-md-4 mt-2">
                                <a href="{{route('edit_user', [$booked->user->id])}}">
                                  <button class="btn btn-sm btn-primary">View Customer</button>
                                </a>
                                <a href="{{route('edit_flight', [$booked->adminFlight->id])}}">
                                  <button class="btn btn-sm btn-primary">View Flight</button>
                                </a>
                            </div>
                          </div>
                        <div class="mt-1"></div>
                        @endforeach
                      @else
                        <div class="alert alert-secondary" role="alert">
                            There are no Booked flights at this moment.
                        </div>
                      @endif
                    </p>
                  </div>
                </div>
          </div>
      </div>
  </div>
  @include('admin.scripts.date_and_time')

@endsection
