@extends('layouts.master')

@section('title', 'Event:')

@section('content')
    <h3>{{ $event->name }}&nbsp;<small>{{ $event->type }}</small></h3>
    {{ $event->type  }}

@endsection