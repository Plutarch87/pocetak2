@extends('layouts.master')

@section('title', 'Users')

@section('content')
    <h2>List of all users</h2>
    <ul>
        @foreach($users as $user)
            <li><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></li>
        @endforeach
    </ul>


@endsection