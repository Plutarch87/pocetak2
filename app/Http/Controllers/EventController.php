<?php namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\EventUpdateRequest;
use Illuminate\Http\Request;

class EventController extends Controller {

    protected $event;

    public function __construct()
    {

    }
	/**
	 * Display a listing of the resource.
	 *
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
     * @param EventUpdateRequest $request
     * @param Event $event
     * @return Response
     */
	public function store(EventUpdateRequest $request, Event $event)
	{
		$event->create($request->all());

        return redirect()->route('events.show', $event->id);
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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
