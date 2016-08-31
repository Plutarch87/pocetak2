@extends('layouts.admin')

@section('title', 'Edit Event')

@section('content')
    {!! Form::model($event, ['method' => 'PUT', 'action' => ['AdminEventController@update', $event->id, $event->id], 'role' => 'form', 'class' => 'form-horizontal']) !!}
        @include('admin.partials.eventForm', ['submitTitle' => 'Update Event'])
    {!! Form::close() !!}
@endsection