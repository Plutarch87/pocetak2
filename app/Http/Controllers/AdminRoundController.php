<?php namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests;
use App\Http\Requests\EventRequest;
use App\Http\Requests\RoundRequest;
use App\Round;
use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminRoundController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\View\View
     * @internal param User $user
     */
    public function edit($id)
    {
        $event = Event::find($id);
        $event->active ? null : $event->active = 1;
        $event->save();

        return view('admin.events.rounds.edit', compact('event'));
    }

    /**
     * @param Request $request
     * @param $id
     * @param $id2
     * @param $id3
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id, $id2, $id3)
    {
        $event = Event::find($id);
        foreach($event->users as $user) :
            $user->rounds()->where('user_id', $id3)->update($request->except('_method', '_token'));
        endforeach;

        return redirect()->route('admin.events.rounds.edit', [$event->id, $event->id, $event->users()->first()->rounds()->count('id')]);
    }

    /**
     * @param $id
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $event = Event::find($id);
        $randoms = $this->getRandomize($event);

        return view('admin.events.rounds.create', compact('event', 'randoms'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $id)
    {
        $event = Event::find($id);
        $round = $event->rounds()->create($request->all());
        foreach($event->users as $user) :
            $result = $user->results()->create($request->except('_token', 'random_chk', 'players'));
            $event->results()->attach($result);
            $round->results()->attach($result);
            $user->rounds()->attach($round->id);
        endforeach;

        return redirect()->route('admin.events.rounds.edit', [$event->id, $event->id, $round->id]);
    }

    public function show($id, User $user)
    {
        $event = Event::find($id);

        return view('admin.events.rounds.show', [$event->id, $event->id], compact('event'));
    }

    /**
     * @param Event $event
     * @return array
     */
    public function getRandomize(Event $event)
    {
        $matchUp = $event->users->shuffle()->chunk(2);
        foreach ($matchUp as $match) :
            $implode[] = $match->implode('name', ' vs ');
        endforeach;
        return $implode;
    }
}
