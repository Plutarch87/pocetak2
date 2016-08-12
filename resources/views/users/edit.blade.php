@extends('layouts.master')

@section('title', 'Edit Page')

@section('content')
    @include('auth.partials.errors')
    @include('auth.partials.flash')
    {!! Form::model($user, ['class' => 'form-horizontal', 'role' => 'form', 'method' => 'PATCH', 'action' => ['UserController@update', $user->id]]) !!}
        @include('users.partials.formEdit')
    {!! Form::close() !!}
@endsection