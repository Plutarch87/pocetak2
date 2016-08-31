<?php namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

class HomeController extends Controller {

	public function index()
	{
	    $users = User::all();
        $events = Event::orderBy('created_at', 'desc');
        return view('home', compact('users', 'events'));
	}

}
