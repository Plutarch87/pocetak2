<?php namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests;
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
     * @param User $user
     * @param Round $round
     * @param Event $event
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $user, Round $round, Event $event)
    {
        return back();
    }

    /**
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function create(User $user, $id)
    {
        $event = Event::find($id);
        $randoms = $this->getRandomize($event);

        return view('admin.events.rounds.create', compact('event', 'round', 'randoms'));
    }

    /**
     * @param Event $event
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Event $event, User $user)
    {
        return redirect()->route('admin.events.rounds.store', [Auth::user()->id, $event->id, $event->rounds()->last()]);
    }

    /**
     * @param Event $event
     * @return array
     */
    public function getRandomize(Event $event)
    {
        $matchUp = $event->rounds()->first()->users->shuffle()->chunk(2);
        foreach ($matchUp as $match) :
            $implode[] = $match->implode('name', ' vs ');
        endforeach;
        return $implode;
    }
}
