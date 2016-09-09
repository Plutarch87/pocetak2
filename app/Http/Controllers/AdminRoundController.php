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
//        $randoms = $this->getRandomize($event);

        return view('admin.events.rounds.edit', compact('event', 'randoms'));
    }

    /**
     * @param RoundRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoundRequest $request, $id, $id2, $id3)
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
     * @param RoundRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoundRequest $request, $id)
    {
        $event = Event::find($id);
        foreach($event->users as $user) :
            $user->rounds()->create($request->except('_token', 'random_chk', 'players'));
        endforeach;

        return redirect()->route('admin.events.rounds.edit', [$event->id, $event->id, $user->rounds()->count()]);
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
