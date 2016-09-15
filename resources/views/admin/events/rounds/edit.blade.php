@extends('layouts.admin')

@section('title', 'Tournament')

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
                @foreach($event->rounds->pop()->results as $result)
                    <tr>
                        <th><a href="{{ route('admin.users.edit', [$result->id, Auth::user()->id]) }}">{{ $result->user->name }}</a></th>
                        {!! Form::model($result, ['method' => 'PUT', 'route' => ['admin.events.rounds.results.update', $event->id, $event->id, $event->rounds()->first()->id, $result->id ]], ['role' => 'form', 'class' => 'form-horizontal']) !!}
                        <th>{!! Form::selectRange('scoreTotal', 0, 3) !!}</th>
                        <th>{!! Form::selectRange('matches', 0, count($event->rounds), ['disabled']) !!}</th>
                        <th>{!! Form::selectRange('sets', 0, 3) !!}</th>
                        <th>{!! Form::selectRange('points', 0, 11) !!}</th>
                        <th>{!! Form::selectRange('wins', 0, (count($event->users) -1)) !!}</th>
                        <th>{!! Form::selectRange('loss', 0, (count($event->users) -1)) !!}</th>
                        <th>{!! Form::selectRange('draw', 0, (count($event->users) -1)) !!}</th>
                        <th>{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}</th>
                        {!! Form::close() !!}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                @if($event->rounds()->count() < ($event->users()->count() - 1) )
                {!! Form::open(['route' => ['admin.events.rounds.store', $event->id, $event->id], 'role' => 'form']) !!}
                    {!! Form::submit('BEGIN ROUND '.($event->rounds()->count() + 1), ['class' => 'btn-lg btn-primary push-right']) !!}
                {!! Form::close() !!}
                @else
                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.events.destroy', $event->id, $event->id]]) !!}
                    {!! Form::submit('FINISH TOURNAMENT', ['class' => 'btn btn-primary pull-right', 'type' => 'button']) !!}
                    {!! Form::close() !!}
                @endif
            </div>
        </div>
    </div>

@endsection