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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('projects', 'ProjectController');

Route::group(['prefix' => 'admin'], function () {
	Route::get('/', function() {
		return Redirect::route("home");
	});

  Auth::routes();


	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/edit', 'HomeController@edit')->name('admin.edit');

	Route::put('/home/', 'HomeController@update')->name('admin.update');
});


