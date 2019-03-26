<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all();
      return view('admin.users.show')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // get the user from the database.
      $user = User::find($id);
      return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // get the user from the database.
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->id_number = $request->input('id_number');
        $user->phone_number = $request->input('phone_number');

        // check if the user sets to admin..
        if ($request->input('admin') !== null && $request->input('admin') === 'on')
        {
          $user->admin = 1;
        } else {
          $user->admin = 0;
        }

        // check if the user sets to super admin..
        if ($request->input('superAdmin') !== null && $request->input('superAdmin') === 'on')
        {
          $user->superAdmin = 1;
        } else {
          $user->superAdmin = 0;
        }

        // updating the user.
        $user->save();
        return redirect()->route('edit_user', $id)->with('status', 'User was updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // get the user from the database.
        $user = User::find($id);
        // deleting the user.
        $user->delete();
        // redirecting to show users page.
        return redirect()->route('show_users');
    }
}
