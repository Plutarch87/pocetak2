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

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index'] );

//User Routes

Route::get('events/{id}/details', [
    'middleware' => 'auth',
    'as' => 'events.details',
    'uses' => 'EventController@details'
]);

Route::resource('events', 'EventController', ['only' => ['index', 'show'] ]);

Route::resource('admin', 'AdminController', ['except' => ['destroy', 'create', 'store']]);

Route::resource('users', 'UserController', ['except' => ['create', 'store']]);


//Admin Routes

Route::get('remove-player/{id}/{user}', ['as' => 'removePlayer', 'uses' => 'AdminEventController@removePlayer' ]);

Route::resource('admin.events', 'AdminEventController');

Route::resource('admin.users', 'AdminUserController');

Route::resource('admin.events.rounds', 'AdminRoundController');

//Controller Routes

Route::controllers(['auth' => 'Auth\AuthController', 'password' => 'Auth\PasswordController',]);

Route::get('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);

Route::get('auth/register', ['as' => 'auth.register', 'uses' => 'Auth\AuthController@getRegister']);

Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);