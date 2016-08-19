@extends('layouts.master')

@section('title', 'Events')

@section('content')
    <h2>List of active tournaments</h2>
    @include('partials.allEvents')
@endsection