@extends('layouts.master')

@section('title', 'Admin Page - Edit a user')

@section('body')

<div class="container">
    @include('admin.includes.tabs')
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                <div class="card-header bg-white">{{ __('Edit a user') }}</div>
                  <div class="card-body">
                    @if (session('status'))
                      <div class="alert alert-success">
                          {{ session('status') }}
                      </div>
                    @endif
                    <form method="POST" action="{{ route('update_user', [$user->id]) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $user->name }}" required>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="id_number" class="col-md-4 col-form-label text-md-right">{{ __('ID Number') }}</label>

                            <div class="col-md-6">
                                <input id="id_number" type="text" class="form-control {{ $errors->has('id_number') ? ' is-invalid' : '' }}" name="id_number" value="{{ $user->id_number }}" required>

                                @if ($errors->has('id_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('id_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="passport_number" class="col-md-4 col-form-label text-md-right">{{ __('Passport Number') }}</label>

                            <div class="col-md-6">
                                <input id="passport_number" type="text" class="form-control {{ $errors->has('passport_number') ? ' is-invalid' : '' }}" name="passport_number" value="{{ $user->passport_number }}">

                                @if ($errors->has('passport_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('passport_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control {{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ $user->phone_number }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="superAdmin" class="col-md-4 col-form-label text-md-right">{{ __('Super Admin') }}</label>

                            <div class="col-md-6">
                                <input id="superAdmin" type="checkbox" class="form-control" name="superAdmin"
                                  {{$user->superAdmin === 1 ? 'checked' : ''}}
                                 >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="admin" class="col-md-4 col-form-label text-md-right">{{ __('Admin') }}</label>

                            <div class="col-md-6">
                                <input id="admin" type="checkbox" class="form-control" name="admin"
                                  {{$user->admin === 1 ? 'checked' : ''}}
                                 >
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
@endsection
