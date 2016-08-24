<?php namespace App\Http\Controllers\Admin;

use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\EventRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller {

    protected $events;

    public function __construct()
    {
        $this->middleware('auth');
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    return view('admin.events.index');
	}

    /**
     * Show the form for creating a new resource.
     *
     * @param Event $event
     * @return Response
     */
	public function create(\Event $event)
	{
        return view('admin.events.create', compact('event'));
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     * @param Event $event
     * @return Response
     */
	public function store(EventRequest $request, \Event $event)
	{
        $event->create($request->all());

        session()->flash('flash_message', 'Tournament created!');

        return redirect()->route('admin.events.index', Auth::user()->id);
	}

    /**
     * Display the specified resource.
     *
     * @internal param int $id
     * @param \Event $event
     * @return \Illuminate\View\View
     */
	public function show(\Event $event)
	{
		return view('admin.events.show', compact('event'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param Event $event
     * @return Response
     * @internal param int $id
     */
	public function edit(\Event $event)
	{
		return view('admin.events.edit', compact('event'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest $request
     * @param Event $event
     * @return Response
     * @internal param $id
     * @internal param Event $event
     * @internal param int $id
     */
	public function update(EventRequest $request, \Event $event)
	{
		$event->update($request->all());

        session()->flash('flash_message', 'Tournament updated!');

        return redirect()->route('admin.events.index', Auth::user()->id);
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param Event $event
     * @return Response
     * @internal param int $id
     */
	public function destroy(\Event $event)
	{
		$event->delete();

        return back();
	}

}
