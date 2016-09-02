<?php namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\EventRequest;
use App\Round;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminEventController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	    $events = Event::all()->sortByDesc('created_at');
		return view('admin.events.index', compact('events'));
	}

    /**
     * Show the form for creating a new resource.
     *
     * @param User $users
     * @return Response
     * @internal param Event $event
     */
	public function create()
	{
	    $users = User::lists('name', 'id');
        return view('admin.events.create', compact('users'));
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
            $event = Event::create($request->except('_token','random_chk'));

            $round = new Round();
            $event->rounds()->save($round);

            $round->users()->attach($request->input('players'));


            session()->flash('flash_message', 'Tournament created successfully. ');

                return redirect()->route('admin.events.show', [$event->id, $event->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @param $id
     * @return Response
     * @internal param Event $event
     * @internal param int $id
     */
	public function show(User $user, $id)
	{
	    $event = Event::find($id);
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
        $users = User::lists('name', 'id');
        return view('admin.events.edit', compact('event', 'users'));
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
	    $event = Event::find($id);
        $event->update($request->except('_token','random_chk','players'));
        $event->rounds->first()->users()->sync($request->input('players'));

        session()->flash('flash_message', 'Tournament successfully updated. ');

        return redirect()->route('admin.events.show', [$event->id, $event->id]);
	}
    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
	public function destroy($id)
	{
	    Event::find($id)->delete();

        return back();
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removePlayer(Request $request, $id)
    {
        $event = Event::find($id);
        $event->rounds()->first()->users()->detach($request->user);
        return back();

    }

}
