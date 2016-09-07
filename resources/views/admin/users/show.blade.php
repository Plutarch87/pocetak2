@extends('layouts.admin')

@section('title', $user->name)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h1>{{ $user->name }}</h1>
                {!! Html::image($user->img, $user->name, ['height'=>100, 'width' => 'auto']) !!}
                <p>{{ $user->email }}</p>
            </div>
        </div>
    </div>
@endsection