<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as' => 'welcome',
    function()
{
    if(Auth::guest()) {
        return view('welcome');
    } else {return redirect()->route('home');}
}]);

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index'] );

Route::resource('admin', 'AdminController');

Route::resource('admin.events', 'Admin\EventController');

Route::resource('users', 'UserController');

Route::resource('admin.users', 'Admin\UserController');

Route::resource('events', 'EventController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('auth/login', [
    'as' => 'auth.login',
    'uses' => 'Auth\AuthController@getLogin'
]);

Route::get('auth/register', [
    'as' => 'auth.register',
    'uses' => 'Auth\AuthController@getRegister'
]);

Route::get('auth/logout', [
    'as' => 'auth.logout',
    'uses' => 'Auth\AuthController@getLogout'
]);