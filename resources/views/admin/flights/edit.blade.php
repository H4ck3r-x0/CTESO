@extends('layouts.master')

@section('title', 'Admin Page - Edit a Flight')

@section('body')

<div class="container">
    @include('admin.includes.tabs')
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header bg-white">{{ __('Edit a Flight') }}</div>
                  <div class="card-body">
                    @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                    @endif
                    <form method="POST" action="{{ route('update_flight', [$flight->id]) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="from" class="col-md-4 col-form-label text-md-right">{{ __('From') }}</label>

                            <div class="col-md-6">
                                <input id="from" type="text" class="form-control {{ $errors->has('from') ? ' is-invalid' : '' }}" name="from" value="{{ $flight->from }}" placeholder="eg, Boston" required autofocus>

                                @if ($errors->has('from'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('from') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="to" class="col-md-4 col-form-label text-md-right">{{ __('To') }}</label>

                            <div class="col-md-6">
                                <input id="to" type="text" class="form-control {{ $errors->has('to') ? ' is-invalid' : '' }}" name="to" value="{{ $flight->to }}" placeholder="eg, DC" required>

                                @if ($errors->has('to'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('to') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="depart" class="col-md-4 col-form-label text-md-right">{{ __('Depart') }}</label>

                            <div class="col-md-6">
                                <input id="depart" type="text" class="form-control {{ $errors->has('depart') ? ' is-invalid' : '' }}" name="depart" value="{{ $flight->depart }}" required>

                                @if ($errors->has('depart'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('depart') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="arrival" class="col-md-4 col-form-label text-md-right">{{ __('Arrival') }}</label>

                            <div class="col-md-6">
                                <input id="arrival" type="text" class="form-control {{ $errors->has('arrival') ? ' is-invalid' : '' }}" name="arrival" value="{{ $flight->arrival }}" required>

                                @if ($errors->has('arrival'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('arrival') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="seats" class="col-md-4 col-form-label text-md-right">{{ __('Seats') }}</label>

                            <div class="col-md-6">
                                <input id="seats" type="text" class="form-control {{ $errors->has('seats') ? ' is-invalid' : '' }}" name="seats" value="{{ $flight->seats }}" placeholder="eg, 20" required>

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
                                <input id="price" type="text" class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ $flight->price }}" placeholder="eg, 600" required>

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                              <p class="text-muted">This Flight was created by <b>{{$flight->user->name}}</b></p>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
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
@endsection
