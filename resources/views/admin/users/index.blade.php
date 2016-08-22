@extends('layouts.admin')

@section('title', 'All Users')

@section('content')
<div class="container">
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Pics</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <th>{{ $user->name }}</th>
                    <th>{{ $user->email }}</th>
                    <th><div class="thumbnail">{!! Html::image($user->img, $user->name, ['width' => '100px']) !!}</div></th>
                    <th><a class="button btn-sm btn-primary" href="{{ action('Admin\UserController@edit', [$user->id, \Auth::user()->id]) }}">Edit</a></th>
                    <th><a class="button btn-sm btn-danger" href="{{ action('Admin\UserController@destroy', [$user->id, \Auth::user()->id]) }}">Delete</a></th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection