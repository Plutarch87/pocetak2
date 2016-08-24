@extends('layouts.admin')

@section('title', 'Create New Event')

@section('content')
    {!! Form::open(['action' => ['Admin\EventController@store', Auth::user()->id], 'role' => 'form', 'class' => 'form-horizontal']) !!}
        @include('admin.partials.eventForm', ['submitTitle' => 'Create Event'])
    {!! Form::close() !!}
@endsection
