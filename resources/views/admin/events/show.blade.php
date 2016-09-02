@extends('layouts.admin')

@section('title', $event->name)

@section('content')
    <h1>{{ $event->type }}</h1>
    <div class="container">
        <h2>Round 1</h2>
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
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($event->rounds()->first()->users as $user)
                <tr>
                    <th><a href="{{ route('admin.users.show', [$user->id, Auth::user()->id]) }}">{{ $user->name }}</a></th>
                    <th>{{ $user->rounds->first()->scoreTotal }}</th>
                    <th>{{ $user->rounds->first()->matches }}</th>
                    <th>{{ $user->rounds->first()->sets }}</th>
                    <th>{{ $user->rounds->first()->points }}</th>
                    <th>{{ $user->rounds->first()->wins }}</th>
                    <th>{{ $user->rounds->first()->loss }}</th>
                    <th>{{ $user->rounds->first()->draw }}</th>
                    <th><a type="button" class="btn btn-danger" href="{{ route('removePlayer', [$event->id, $user]) }}">&minus;</a></th>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-4">
                <a type="button" class="btn btn-default" href="{{ route('admin.events.edit', [$event->id, $event->id]) }}">Edit</a>
            </div>
            <div class="col-md-4">

                <a type="button" class="btn-lg btn-primary" href="{{ route('admin.events.rounds.edit', [Auth::user()->id, $event->id, $user->rounds->first()->id]) }}">BEGIN TOURNAMENT</a>
            </div>
        </div>
    </div>
@endsection