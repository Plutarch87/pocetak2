@extends('layouts.master')

@section('title', 'Event:')

@section('content')
    <div class="container">
        <h1>{{ $event->name }}</h1>
        <h2>Type: <small>{{ $event->type }}</small></h2>
        <hr>
        <h3>Round 1</h3>
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Player Name</th>
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
            @foreach($users as $user)
                <tr>
                    <th><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></th>
                    <th>{{ $user->rounds->first()->scoreTotal }}</th>
                    <th>{{ $user->rounds->first()->matches }}</th>
                    <th>{{ $user->rounds->first()->sets }}</th>
                    <th>{{ $user->rounds->first()->points }}</th>
                    <th>{{ $user->rounds->first()->wins }}</th>
                    <th>{{ $user->rounds->first()->loss }}</th>
                    <th>{{ $user->rounds->first()->draw }}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{ route('events.index') }}" type="button" class="btn btn-primary">Back to Events</a>
    </div>
@endsection