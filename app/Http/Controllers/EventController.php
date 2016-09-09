<?php namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\EventRequest;
use App\User;
use Illuminate\Http\Request;

class EventController extends Controller {

    protected $events;

    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     * @return Response
     * @internal param Event $events
     */
	public function index()
	{
	    $events = Event::all();
	    return view('events.index', compact('events'));
	}

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @param Event $event
     * @return Response
     * @internal param int $id
     */
	public function show(User $user, Event $event)
	{
        $rounds = $event->rounds();
        $users = $event->users;

        return view('events.show', compact('event', 'rounds', 'user', 'users'));
	}

	public function details($id)
	{
	    $event = Event::find($id);
        $users = $event->users;

	    return view('events.details', compact('event', 'users'));
	}

}
