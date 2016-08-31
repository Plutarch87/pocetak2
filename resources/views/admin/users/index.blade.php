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
                <th><a href="{{ route('admin.users.show', [$user->id, Auth::user()->id]) }}">{{ $user->name }}</a></th>
                    <th>{{ $user->email }}</th>
                    <th><div class="thumbnail">{!! Html::image($user->img, $user->name, ['width' => '100px']) !!}</div></th>
                    <th><a class="button btn-sm btn-primary" href="{{ action('AdminUserController@edit', [$user->id, Auth::user()->id ]) }}">Edit</a></th>
                    <th>
                        @if(Auth::user()->isAdmin())
                        {!! Form::open(['method' => 'DELETE', 'route' => ['admin.users.destroy', $user->id, Auth::user()->id  ], 'onClick' => 'return confirm("Are you sure?")']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                        @endif
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection