@extends('layouts.master')

@section('title', 'Admin Page - Add a Flight')

@section('body')

<div class="container">
    @include('admin.includes.tabs')
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header bg-white">{{ __('Add a Flight') }}</div>
                    @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                    @endif
                  <div class="card-body">
                    <form method="POST" action="{{ route('save_flight') }}">
                        @csrf
                        <div class="form-group row">
                          <div class="col-md-6">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="roundtrip" id="oneway" value="oneway" onclick="disable_return_date()" checked>
                              <label class="form-check-label" for="oneway">One way</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="roundtrip" id="return" value="return" onclick="enable_return_date()">
                              <label class="form-check-label" for="return">Return</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                            <label for="from" class="col-md-4 col-form-label text-md-right">{{ __('From') }}</label>

                            <div class="col-md-6">
                                <input id="from" type="text" class="form-control {{ $errors->has('from') ? ' is-invalid' : '' }}" name="from" value="{{ old('from') }}" placeholder="eg, Boston" required autofocus>

                                @if ($errors->has('from'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('from') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="departure_airport" class="col-md-4 col-form-label text-md-right">{{ __('Departure Airport') }}</label>

                            <div class="col-md-6">
                                <input id="departure_airport" type="text" class="form-control {{ $errors->has('departure_airport') ? ' is-invalid' : '' }}" name="departure_airport" value="{{ old('departure_airport') }}" placeholder="eg, Boston Airport" required>

                                @if ($errors->has('departure_airport'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('departure_airport') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                          <hr>
                        </div>

                        <div class="form-group row">
                            <label for="to" class="col-md-4 col-form-label text-md-right">{{ __('To') }}</label>

                            <div class="col-md-6">
                                <input id="to" type="text" class="form-control {{ $errors->has('to') ? ' is-invalid' : '' }}" name="to" value="{{ old('to') }}" placeholder="eg, DC" required>

                                @if ($errors->has('to'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('to') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="arrival_airport" class="col-md-4 col-form-label text-md-right">{{ __('Arrival Airport') }}</label>

                            <div class="col-md-6">
                                <input id="arrival_airport" type="text" class="form-control {{ $errors->has('arrival_airport') ? ' is-invalid' : '' }}" name="arrival_airport" value="{{ old('arrival_airport') }}" placeholder="eg, DC Airport" required>

                                @if ($errors->has('arrival_airport'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('arrival_airport') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                          <div class="form-group">
                            <hr>
                          </div>

                        <div class="form-group row">
                            <label for="depart_date" class="col-md-4 col-form-label text-md-right">{{ __('Depart Date') }}</label>

                            <div class="col-md-6">
                                <input id="depart_date" type="text" class="form-control {{ $errors->has('depart_date') ? ' is-invalid' : '' }}" name="depart_date" value="{{ old('depart_date') }}" required>

                                @if ($errors->has('depart_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('depart_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="depart_time" class="col-md-4 col-form-label text-md-right">{{ __('Depart Time') }}</label>

                            <div class="col-md-6">
                                <input id="depart_time" type="text" class="form-control {{ $errors->has('depart_time') ? ' is-invalid' : '' }}" name="depart_time" value="{{ old('depart_time') }}" required>

                                @if ($errors->has('depart_time'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('depart_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="arrival" class="col-md-4 col-form-label text-md-right">{{ __('Arrival') }}</label>

                            <div class="col-md-6">
                                <input id="arrival" type="text" class="form-control {{ $errors->has('arrival') ? ' is-invalid' : '' }}" name="arrival" value="{{ old('arrival') }}" required>

                                @if ($errors->has('arrival'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('arrival') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                          <hr>
                        </div>

                        <div class="form-group row">
                          <label for="return_date" class="col-md-4 col-form-label text-md-right">Return</label>
                          <div class="col-md-6">
                          <input id="return_date" type="text" class="form-control {{ $errors->has('return_date') ? ' is-invalid' : '' }}" name="return_date" placeholder="01/01/2019" required>
                          @if ($errors->has('return_date'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('return_date') }}</strong>
                              </span>
                          @endif
                        </div>
                        </div>

                        <div class="form-group row">
                            <label for="seats" class="col-md-4 col-form-label text-md-right">{{ __('Seats') }}</label>

                            <div class="col-md-6">
                                <input id="seats" type="text" class="form-control {{ $errors->has('seats') ? ' is-invalid' : '' }}" name="seats" value="{{ old('seats') }}" placeholder="eg, 20" required>

                                @if ($errors->has('seats'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('seats') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" placeholder="eg, 600" required>

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                                <span id="price_message" class="">
                                  Note: You must include the price for the roundtrip.
                                </span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                              <input type="hidden" name="created_by" value="{{ Auth::user()->id }}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>

                    </form>
                  </div>
              </div>
          </div>
      </div>
</div>
@include('admin.scripts.date_and_time')
@include('search.scripts.roundtrip')
@endsection
