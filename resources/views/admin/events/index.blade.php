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
                    <th><a href="{{ route('admin.events.show', [$event->id, $event->id]) }}">{{ $event->name }}</a></th>
                    <th>{{ $event->type }}</th>
                    <th>{{ count($event->rounds->first()->users) }}</th>
                    <th>{{ $event->isActive($event) }}</th>
                    <th>{{ $event->created_at }}</th>
                    <th>{{ $event->updated_at }}</th>
                    <th><a class="button btn-sm btn-primary" href="{{ route('admin.events.edit', [$event->id, $event->id ]) }}">Edit</a></th>
                    <th>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['admin.events.destroy', $event->id, $event->id  ], 'onClick' => 'return confirm("Are you sure?")']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn-xs btn-danger']) !!}
                    {!! Form::close() !!}
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
