<?php namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\EventRequest;
use App\Http\Requests\EventUpdateRequest;
use Illuminate\Http\Request;

class EventController extends Controller {

    protected $events;

    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @param Event $events
     * @return Response
     */
	public function index()
	{
	    return view('events.index');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @param Event $event
     * @return Response
     */
	public function create(Event $event)
	{
		return view('events.create', compact('event'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     * @param Event $event
     * @return Response
     */
	public function store(EventRequest $request, Event $event)
	{
        $event->create($request->all());

        session()->flash('flash_message', 'Tournament created!');

        return redirect()->route('admin.events.index');
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

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
	    $event = Event::find($id);
		return view('admin.events.edit', compact('event'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Event $event)
	{
        return view('admin.events.edit', compact('event'));
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
