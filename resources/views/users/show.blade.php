@extends('layouts.master')

@section('content')

    <h1>{!!  $user->name !!}'s Profile</h1>
    <p>{!! $user->email !!}</p>

@endsection