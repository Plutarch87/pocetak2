@extends('layouts.master')

@section('title', 'Events')

@section('content')
    <h2>List of active tournaments</h2>
    <ul>
        @foreach($events as $event)
            <li><a href="{{ route('events.show', $event->id) }}">{{ $event->name }}</a></li>
        @endforeach
    </ul>
@endsection