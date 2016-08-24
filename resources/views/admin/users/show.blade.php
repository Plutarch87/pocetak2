@extends('layouts.admin')

@section('title', $user->name)

@section('content')
    {{ $user->id }}
@endsection