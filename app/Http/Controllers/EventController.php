<?php namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\EventRequest;
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
     * @param Event $event
     * @return Response
     * @internal param int $id
     */
	public function show(Event $event)
	{
		return view('events.show', compact('event'));
	}

}
