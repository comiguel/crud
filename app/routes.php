<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//Route::get('/', 'UserController@showLogin');
Route::get('login','UserController@showLogin');
Route::post('login','UserController@postLogin');
Route::get('/', 'UserController@getIndex');
Route::group(array('before' => 'auth'), function()
{
	Route::post('/users/store','UserController@store');
	Route::post('/users/update/{id}','UserController@update');
	Route::get('/users/destroy/{id}','UserController@destroy');
	Route::controller('users','UserController');
	Route::get('logout','UserController@logOut');
});
