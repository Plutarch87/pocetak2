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

use App\Event;

Route::get('/', [
    'as' => 'welcome',
    function()
{
    if(Auth::guest()) {
        return view('welcome');
    } else {return redirect()->route('home');}
}]);

Route::get('/admin/{admin}/add-to-round', [
    'as' => 'user.addToRound',
    'uses' => 'RoundController@addToRound'
]);

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index'] );

Route::resource('admin', 'AdminController');

Route::resource('users', 'UserController');

Route::resource('events', 'EventController', [
    'only' => ['index', 'show']
]);

Route::resource('admin.events', 'AdminEventController');

Route::resource('admin.users', 'AdminUserController');

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