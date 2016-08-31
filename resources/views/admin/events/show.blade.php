@extends('layouts.admin')

@section('title', $event->name)

@section('content')
    <h1>{{ $event->type }}</h1>
    <div class="container">
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
            @foreach($event->rounds as $round)
                <tr>
                    <th>{{ $round->player }}</th>
                    <th>{{ $round->scoreTotal }}</th>
                    <th>{{ $round->matches }}</th>
                    <th>{{ $round->sets }}</th>
                    <th>{{ $round->points }}</th>
                    <th>{{ $round->wins }}</th>
                    <th>{{ $round->loss }}</th>
                    <th>{{ $round->draw }}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
