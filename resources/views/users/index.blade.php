@extends('layouts.master')

@section('content')

    <div class="container">
        <h1>Timeline</h1>

        <hr>
        <h2>Users:</h2>
        @foreach($users as $user)
            <h3><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></h3>
        @endforeach
        <hr>
        <h2>Events:</h2>
    </div>

@endsection