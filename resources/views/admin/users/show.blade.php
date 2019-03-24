@extends('layouts.master')

@section('title', 'Admin Page - Show users')

@section('body')

<div class="container">
    @include('admin.includes.tabs')
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header bg-white">{{ __('Show users') }}</div>
                  <div class="card-body">

                    <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">ID Number</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Admin</th>
                        <th scope="col">Created at</th>
                        @if (Auth::user()->superAdmin)
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                      <tr class="{{$user->admin === 1 ? 'bg-light' : '' || $user->superAdmin === 1 ? 'bg-light' : ''}}">
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->id_number}}</td>
                        <td>{{$user->phone_number}}</td>
                        <td>
                          @if ($user->superAdmin === 1)
                            Super Admin
                          @elseif ($user->admin === 1)
                            Admin
                          @else
                            User
                          @endif
                        </td>
                        <td>{{$user->created_at}}</td>
                        @if (Auth::user()->superAdmin)
                        <td>
                          <a href="{{route('edit_user', [$user->id])}}">
                            <button type="button" class="btn btn-info">Edit</button>
                          </a>
                        </td>
                        <td>
                          <a href="{{route('delete_user', [$user->id])}}">
                            <button type="button" class="btn btn-danger">Delete</button>
                          </a>
                        </td>
                        @endif
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  </div>
              </div>
          </div>
      </div>
</div>
@endsection
