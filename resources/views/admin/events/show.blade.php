@extends('layouts.admin')

@section('title', $event->name)

@section('content')
    <div class="container">
        <h1>Type: <small>{{ $event->type }}</small></h1>
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
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
            @if($event->active)
                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.events.destroy', $event->id, $event->id]]) !!}
                          {!! Form::submit('Deactivate', ['class' => 'btn btn-default pull-left', 'type' => 'button']) !!}
                    {!! Form::close() !!}
                    <a type="button" class="btn-lg btn-primary" href="{{ route('admin.events.rounds.edit', [$event->id, $event->id, $event->rounds()->first()->id]) }}">PROCEED</a>
                @else
                    <a type="button" class="btn btn-default" href="{{ route('admin.events.edit', [$event->id, $event->id]) }}">Edit</a>
                    <a type="button" class="btn-lg btn-primary" href="{{ route('admin.events.rounds.edit', [$event->id, $event->id, $event->rounds()->first()->id]) }}">BEGIN TOURNAMENT</a>
                @endif
            </div>
        </div>


    </div>
@endsection