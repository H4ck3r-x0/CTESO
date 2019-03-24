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
                      Welcome, <b>{{Auth::user()->name}}</b> to CTEOS admin panel.
                    </p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  @include('admin.scripts.date_and_time')

@endsection
