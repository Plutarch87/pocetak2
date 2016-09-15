@extends('layouts.master')

@section('title', $user->name)

@section('content')

    <div class="container">
        <div class="row">
            <div class="thumbnail col-sm-2">
                {!! Html::image($user->img) !!}
                <p><a href="#">{!! $user->email !!}</a></p>
            </div>
            <div class="col-md-4 pull-right">
                <h3>Match History</h3>
                @if(count($user->events))
                    @foreach($user->events as $event)
                        <ul>
                            <li>
                                <a href="{{ route('events.show', $event->id) }}">{{ $event->name }}</a>
                            </li>
                        </ul>
                    @endforeach
                @endif
            </div>
        </div>
        @if(count($user->rounds))
            @foreach($user->events as $event)
                <div class="row">
                    <h3>Overall</h3>
                    <h2>{{ $event->name }}</h2>
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Score</th>
                            <th>Matches</th>
                            <th>Sets</th>
                            <th>Points</th>
                            <th>Wins</th>
                            <th>Losses</th>
                            <th>Draws</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>{{ $event->results->where('user_id', $user->id)->sum('scoreTotal') }}</th>
                            <th>{{ $event->results->where('user_id', $user->id)->sum('matches') }}</th>
                            <th>{{ $event->results->where('user_id', $user->id)->sum('sets') }}</th>
                            <th>{{ $event->results->where('user_id', $user->id)->sum('points') }}</th>
                            <th>{{ $event->results->where('user_id', $user->id)->sum('wins') }}</th>
                            <th>{{ $event->results->where('user_id', $user->id)->sum('loss') }}</th>
                            <th>{{ $event->results->where('user_id', $user->id)->sum('draw') }}</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
        @endif
    </div>

@endsection