@extends('layouts.admin')

@section('title', 'Edit Profile: '.$user->name)

@section('content')
    {!! Form::model($user, ['class' => 'form-horizontal', 'files' => true, 'role' => 'form', 'method' => 'PATCH', 'action' => ['AdminUserController@update',$user->id ,Auth::user()->id ]]) !!}
        @include('partials.formEdit', ['img' => $user->img])
    {!! Form::close() !!}
@endsection