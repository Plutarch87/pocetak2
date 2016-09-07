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
            </div>
        </div>
        @if(count($user->rounds))
        <div class="row">
            <h3>Overall</h3>
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
                    <th>{{ $user->rounds->first()->scoreTotal }}</th>
                    <th>{{ $user->rounds->first()->matches }}</th>
                    <th>{{ $user->rounds->first()->sets }}</th>
                    <th>{{ $user->rounds->first()->points }}</th>
                    <th>{{ $user->rounds->first()->wins }}</th>
                    <th>{{ $user->rounds->first()->loss }}</th>
                    <th>{{ $user->rounds->first()->draw }}</th>
                </tr>
                </tbody>
            </table>
        </div>
        @endif
    </div>

@endsection