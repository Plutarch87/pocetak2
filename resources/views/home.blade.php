@extends('layouts.master')

@section('content')

    <div class="container">
        <h1>Timeline</h1>

        <hr>
        <h2>Users:</h2>
        @foreach($users as $user)
            <li><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></li>
        @endforeach
        <hr>
        <h2>Events:</h2>
        @foreach($events as $event)
            <li><a href="{{ route('events.show', $event->id) }}">{{ $event->name }}</a></li>
        @endforeach
    </div>

@endsection