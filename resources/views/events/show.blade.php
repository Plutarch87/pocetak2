@extends('layouts.master')

@section('title', 'Event:')

@section('content')
    <h3>{{ $event->name }}<small>{{ $event->type }}</small></h3>

@endsection