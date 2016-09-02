@extends('layouts.admin')

@section('title', 'Tournament')

@section('content')
    <h1>{{ $event->name }}<small>Started @ {{ $event->rounds->first()->updated_at }}</small></h1>
    <h2>{{ $event->type }}</h2>
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
            </tr>
            </thead>
            <tbody>
            @foreach($event->rounds()->first()->users as $user)
                {!! Form::model($event, ['method' => 'PUT', 'route' => ['admin.events.rounds.update', Auth::user()->id, $event->id, $event->rounds->first()->id]], ['role' => 'form', 'class' => 'form-horizontal']) !!}

                <tr>
                    <th><a href="{{ route('admin.users.show', [$user->id, Auth::user()->id]) }}">{{ $user->name }}</a></th>
                    <th>{!! Form::select('score', [0,1,3]) !!}</th>
                    <th>{!! Form::select('matches', [1], ['disabled']) !!}</th>
                    <th>{!! Form::select('sets', [1,2,3]) !!}</th>
                    <th>{!! Form::selectRange('points', 1, 11) !!}</th>
                    <th>{!! Form::select('wins', []) !!}</th>
                    <th>{!! Form::select('loss', []) !!}</th>
                    <th>{!! Form::select('draw', []) !!}</th>
                </tr>

                {!! Form::close() !!}
            @endforeach
            </tbody>
        </table>
    </div>
@endsection