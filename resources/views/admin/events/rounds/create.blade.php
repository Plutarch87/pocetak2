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
            {{--<div class="col-md-4">--}}
            {{--@foreach($randoms as $random)--}}
            {{--<h3>{{ $random }}</h3>--}}
            {{--@endforeach--}}
            {{--</div>--}}
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
                @foreach($event->users as $user)
                    <tr>
                        <th><a href="{{ route('admin.users.show', [$user->id, Auth::user()->id]) }}">{{ $user->name }}</a></th>
                        {!! Form::model($user->rounds->first(), ['method' => 'PUT', 'route' => ['admin.events.rounds.update', $event->id, $event->id, $user->id]], ['role' => 'form', 'class' => 'form-horizontal']) !!}
                        <th>{!! Form::select('scoreTotal', [0,1,3]) !!}</th>
                        <th>{!! Form::select('matches', [1], ['disabled']) !!}</th>
                        <th>{!! Form::select('sets', [1,2,3]) !!}</th>
                        <th>{!! Form::selectRange('points', 1, 11) !!}</th>
                        <th>{!! Form::selectRange('wins', 0, 7) !!}</th>
                        <th>{!! Form::select('loss', []) !!}</th>
                        <th>{!! Form::select('draw', []) !!}</th>
                        <th>{!! Form::submit('Save', ['class' => 'btn btn-success']) !!}</th>
                        {!! Form::close() !!}
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6">
                <a type="button" class="btn-lg btn-primary pull-right" href="{{ route('admin.events.rounds.create', [$event->id, $event->id]) }}">BEGIN ROUND {{ $user->rounds()->count() + 1 }}</a>
            </div>
        </div>
    </div>

@endsection