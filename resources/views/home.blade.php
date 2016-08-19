@extends('layouts.master')

@section('content')

    <div class="container">
        <h1>Timeline</h1>

        <hr>
        <h2>Users:</h2>
        @include('partials.allUsers')
        <hr>
        <h2>Events:</h2>
        @include('partials.allEvents')
    </div>

@endsection