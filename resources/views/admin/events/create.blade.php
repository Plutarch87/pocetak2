@extends('layouts.admin')

@section('title', 'Create New Event')

@section('content')
    {!! Form::open(['route' => ['admin.events.store', Auth::user()->id], 'role' => 'form', 'class' => 'form-horizontal']) !!}
        @include('admin.partials.eventForm', ['submitTitle' => 'Create Event'])
    {!! Form::close() !!}
@endsection
