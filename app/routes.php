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
Route::get('/', function(){
	return View::make('index')->with('title', 'Course Evaluation System');
});

Route::get('/admin', function(){
	return Redirect::route('dashboard');
});

Route::group(['before' => 'guest'], function(){
	Route::controller('password', 'RemindersController');
	Route::get('login', ['as'=>'login','uses' => 'AuthController@login']);
	Route::post('login', array('uses' => 'AuthController@doLogin'));
});

Route::group(array('before' => 'auth'), function()
{

	Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
	Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'AuthController@dashboard'));
	Route::get('change-password', array('as' => 'password.change', 'uses' => 'AuthController@changePassword'));
	Route::post('change-password', array('as' => 'password.doChange', 'uses' => 'AuthController@doChangePassword'));
	
	Route::get('user', ['as' => 'user.index', 'uses' => 'AuthController@index']);
	Route::get('user/add', ['as' => 'user.create', 'uses' => 'AuthController@create']);
	Route::post('user', ['as' => 'user.store', 'uses' => 'AuthController@store']);

	Route::get('token', ['as' => 'token.index', 'uses' => 'TokenController@index']);
	Route::get('token/create', ['as' => 'token.create', 'uses' => 'TokenController@create']);
	Route::post('create', ['as' => 'token.store', 'uses' => 'TokenController@store']);
	Route::post('token/check', ['as' => 'token.check', 'uses' => 'TokenController@check']);
	Route::get('token/delete', ['as' => 'token.delete', 'uses' => 'TokenController@destroy']);


});