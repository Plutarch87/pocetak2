<?php namespace App\Http\Controllers;

use App\Event;
use App\Http\Requests;
use App\Round;
use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminRoundController extends Controller
{
    /**
     * @param User $user
     * @param Event $event
     * @param Round $round
     * @return \Illuminate\View\View
     */
    public function edit(User $user, Event $event, Round $round)
    {
        return view('admin.events.rounds.edit', compact('event', 'round'));
    }

    public function update(User $user, Round $round, Event $event)
    {
        return back();
    }
}
