@extends('layouts.master')

@section('title', $user->name)

@section('content')

    <p><a href="#">{!! $user->email !!}</a></p>
    <div class="thumbnail col-sm-2">
        {!! Html::image($user->img) !!}
    </div>

@endsection