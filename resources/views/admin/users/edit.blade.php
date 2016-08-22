@extends('layouts.admin')

@section('title', 'Edit Profile: '.$user->name)

@section('content')
    {!! Form::model($user, ['class' => 'form-horizontal', 'files' => true, 'role' => 'form', 'method' => 'PATCH', 'action' => ['Admin\UserController@update', $user->id, Auth::user()->id]]) !!}
        @include('partials.formEdit')
    {!! Form::close() !!}
@endsection