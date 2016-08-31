@extends('layouts.master')

@section('title', 'Edit Page')

@section('content')
    @include('auth.partials.errors')
    @include('auth.partials.flash')
    {!! Form::model($user, ['class' => 'form-horizontal', 'files' => true, 'role' => 'form', 'method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) !!}
        @include('partials.formEdit', ['img' => $user->img])
    {!! Form::close() !!}
@endsection