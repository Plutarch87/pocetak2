@extends('layouts.admin')

@section('title', 'Events')

@section('content')
<div class="container">
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>#Players</th>
                <th>Status</th>
                <th>Started</th>
                <th>Finished</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <th><a href="{{ route('admin.events.show', [Auth::user()->id, $event->id ]) }}">{{ $event->name }}</a></th>
                    <th>{{ $event->type }}</th>
                    <th>{{ $event->playerNo }}</th>
                    <th>{{ $event->active }}</th>
                    <th>{{ $event->created_at }}</th>
                    <th>{{ $event->updated_at }}</th>
                    <th><a class="button btn-sm btn-primary" href="{{ route('admin.events.edit', [Auth::user()->id, $event->id]) }}">Edit</a></th>
                    <th>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.events.destroy', Auth::user()->id, $event->id ]]) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
