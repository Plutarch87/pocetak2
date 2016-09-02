@extends('layouts.admin')

@section('title', 'Create New Event')

@section('content')
    {!! Form::open(['route' => ['admin.events.store', Auth::user()->id], 'role' => 'form', 'class' => 'form-horizontal']) !!}
    @include('admin.partials.eventForm', ['submitTitle' => 'Create Tournament'])
    {!! Form::close() !!}
@endsection
