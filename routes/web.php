<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Authiantcation routes, Register, login and logout
Auth::routes();
// End Authiantcation routes.

// Homepage Route
Route::get('/', 'HomeController@index')->name('home');


// Admin Panel Routes
Route::prefix('admin')->middleware(['middleware' => 'admin'])->group(function () {
  // Admins Route
  Route::get('index', 'AdminController@index')->name('index');
  //End Admins Route

  // Users Route
    Route::get('users', 'AdminUsersController@index')->name('show_users');
    Route::get('edit_user/{id}', 'AdminUsersController@edit')
            ->middleware(['middleware' => 'superAdmin'])
            ->name('edit_user');
    Route::post('update_user/{id}', 'AdminUsersController@update')
            ->middleware(['middleware' => 'superAdmin'])
            ->name('update_user');
    Route::get('delete_user/{id}', 'AdminUsersController@destroy')
            ->middleware(['middleware' => 'superAdmin'])
            ->name('delete_user');
  // End Users Route
});
# End Admin Panel Routes
