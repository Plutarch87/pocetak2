@extends('layouts.master')

@section('title', 'Create New Event')

@section('content')

    {!! Form::open(['class' => 'form-horizontal', 'action' => ['EventController@store', $event->id]]) !!}
          @include('events.partials.create')
    {!! Form::close() !!}

@endsection