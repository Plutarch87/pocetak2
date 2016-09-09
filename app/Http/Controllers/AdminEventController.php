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
	public function store(EventRequest $request)
	{
	    $event = Event::create($request->except('_token','random_chk'));
        $event->save();
        $event->users()->sync($request->input('players'));
        foreach($event->users as $user) :
            $user->rounds()->create($request->except('_token', 'random_chk', 'players'));
        endforeach;

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
        $request->input('players') ? $event->users()->sync($request->input('players')) : null;

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

        session()->flash('flash_delete', 'Tournament deactivated. You can view all inactive tournaments <a href="#">here</a>.');
        return redirect()->route('admin.events.index', Auth::user()->id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function removePlayer(Request $request, $id)
    {
        $event = Event::find($id);
        $event->users()->detach($request->user);
        return back();

    }
}
