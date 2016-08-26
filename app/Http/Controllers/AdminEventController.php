<?php namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\EventRequest;
use App\User;
use Illuminate\Http\Request;

class AdminEventController extends Controller {

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
	public function create()
	{
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     * @param $id
     * @return Response
     * @internal param Event $event
     */
	public function store(EventRequest $request, $id)
	{

	    Event::where('id', $id)->insert($request->except('_token','random_chk'));

        session()->flash('flash_message', 'Event successfully created.');

        return back();
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
		return view('admin.events.show', compact('user', 'event'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @param $id
     * @return Response
     * @internal param Event $event
     * @internal param int $id
     */
	public function edit(User $user, $id)
	{
        $event = Event::find($id);

        return view('admin.events.edit', compact('user', 'event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest $request
     * @param $id
     * @return Response
     * @internal param Event $event
     * @internal param int $id
     */
	public function update(EventRequest $request, $id)
	{
        Event::where('id', $id)->update($request->except('_token','random_chk','_method'));

        session()->flash('flash_message', 'Event successfully updated.');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @param Event $event
     * @return Response
     * @internal param int $id
     */
	public function destroy(User $user, $id)
	{
	    Event::find($id)->delete();

        return back();
    }

}
