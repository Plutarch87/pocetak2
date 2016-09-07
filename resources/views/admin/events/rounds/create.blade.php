@extends('layouts.admin')

@section('title', 'Tournament')

@section('content')
    <div class="container">
        <div class="row">
            <h1>{{ $event->name }}<small> Started @ {{ $event->rounds->first()->updated_at }}</small></h1>
            <div class="col-md-6">
                <h2>Type: <small>{{ $event->type }}</small></h2>
                <h3>Round {{ $event->rounds()->count() }}</h3>
            </div>
            <div class="col-md-4">
                @foreach($randoms as $random)
                    <h3>{{ $random }}</h3>
                @endforeach
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
                @foreach($event->rounds()->first()->users as $user)
                    {!! Form::model($event->rounds()->first(), ['method' => 'PUT', 'route' => ['admin.events.rounds.update', $event->id, $event->id]], ['role' => 'form', 'class' => 'form-horizontal']) !!}

                    <tr>
                        <th><a href="{{ route('admin.users.show', [$user->id, Auth::user()->id]) }}">{{ $user->name }}</a></th>
                        <th>{!! Form::select('score', [0,1,3]) !!}</th>
                        <th>{!! Form::select('matches', [1], ['disabled']) !!}</th>
                        <th>{!! Form::select('sets', [1,2,3]) !!}</th>
                        <th>{!! Form::selectRange('points', 1, 11) !!}</th>
                        <th>{!! Form::selectRange('wins', 0, 7) !!}</th>
                        <th>{!! Form::select('loss', []) !!}</th>
                        <th>{!! Form::select('draw', []) !!}</th>
                        <th>{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}</th>
                    </tr>
                    {!! Form::close() !!}
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection