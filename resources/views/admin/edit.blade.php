@extends('layouts.admin')
@section('title', 'Edit Profile')
@section('content')
    @include('auth.partials.errors')
    @include('auth.partials.flash')
    {!! Form::model(\Auth::user(), ['class' => 'form-horizontal', 'files' => true, 'role' => 'form', 'method' => 'PATCH', 'action' => ['AdminController@update', \Auth::user()->id]]) !!}
        @include('partials.formEdit')
    {!! Form::close() !!}
@endsection
@section('content')
@endsection