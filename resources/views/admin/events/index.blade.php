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
                <th>Created</th>
                <th>Finished</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($events as $event)
                <tr>
                    <th>{{ $event->name }}</th>
                    <th>{{ $event->type }}</th>
                    <th>{{ $event->playerNo }}</th>
                    <th>{{ $event->created_at }}</th>
                    <th>{{ $event->updated_at }}</th>
                    <th><a class="button btn-sm btn-primary" href="{{ route('admin.events.edit', [Auth::user()->id, $event->id]) }}">Edit</a></th>
                    <th><a class="button btn-sm btn-danger" href="{{ route('admin.events.destroy', [Auth::user()->id, $event->id]) }}">Delete</a></th>
                </tr>
            @endforeach

@endsection
