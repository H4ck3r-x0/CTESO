<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Redirect;

class UsersController extends Controller
{
    public function show($user)
    {
      $user = User::where('name', $user)->with('book.adminFlight')->first();
      if(!$user)
      {
        abort(404);
      }
      return view('profile.show')->with('user', $user);
    }
}
