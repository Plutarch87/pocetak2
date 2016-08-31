@extends('layouts.admin')
@section('title', Auth::user()->name .' Profile')

@section('content')
    <div class="thumbnail col-sm-2">
        {!! Html::image($user->img) !!}
    </div>
    <h1>{{ $user->name  }}</h1>
    <p>Email: <a href="#">{!! $user->email !!}</a></p>
@endsection