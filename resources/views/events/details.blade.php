@extends('layouts.master')

@section('title', 'Event:')

@section('content')
    <div class="container">
        <h1>{{ $event->name }}</h1>
        <h2>Type: <small>{{ $event->type }}</small></h2>
        <hr>
    @foreach($event->rounds as $round)
            <h3>Round {{ $round->id }}</h3>
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
            @foreach($event->rounds->first()->results as $result)
                <tr>
                    <th><a href="{{ route('users.show', $result->user->id) }}">{{ $result->user->name }}</a></th>
                    <th>{{ $result->scoreTotal }}</th>
                    <th>{{ $result->matches }}</th>
                    <th>{{ $result->sets }}</th>
                    <th>{{ $result->points }}</th>
                    <th>{{ $result->wins }}</th>
                    <th>{{ $result->loss }}</th>
                    <th>{{ $result->draw }}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endforeach
        <a href="{{ route('events.index') }}" type="button" class="btn btn-primary">Back to Events</a>
    </div>
@endsection