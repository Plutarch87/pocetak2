@extends('layouts.admin')

@section('title', 'Rounds')

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{ $event->name }}<small> Started @ {{ $event->users->first()->updated_at }}</small></h1>
            <div class="col-md-6">
                <h2>Type: <small>{{ $event->type }}</small></h2>
                <h3>Round {{ $event->rounds()->count() }}</h3>
            </div>
        </div>
        <hr>
        <div class="row">
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
                    <th>Save</th>
                </tr>
                </thead>
                <tbody>
                @foreach($event->rounds->first()->results as $result)
                    <tr>
                        <th><a href="{{ route('admin.users.edit', [$result->id, Auth::user()->id]) }}">{{ $result->user->name }}</a></th>
                        <th>{{ $result->scoreTotal }}</th>
                        <th>{{ $result->matches }}</th>
                        <th>{{ $result->sets }}</th>
                        <th>{{ $result->points }}</th>
                        <th>{{ $result->wins }}</th>
                        <th>{{ $result->loss }}</th>
                        <th>{{ $result->draw }}</th>
                        <th><a type="button" class="btn btn-danger" href="{{ route('removePlayer', [$event->id, $result]) }}">&minus;</a></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                    <a type="button" class="btn-lg btn-primary" href="{{ route('admin.events.rounds.edit', [$event->id, $event->id, $event->rounds()->first()->id]) }}">BEGIN TOURNAMENT</a>
            </div>
        </div>
    </div>
@endsection