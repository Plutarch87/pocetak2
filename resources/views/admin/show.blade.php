@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
    <h1>{{ Auth::user()->name }} Profile</h1>

@endsection