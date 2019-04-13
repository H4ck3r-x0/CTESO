<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function show($user)
    {
      $user = User::where('name', $user)->with('book.adminFlight')->first();
      return view('profile.show')->with('user', $user);
    }
}
