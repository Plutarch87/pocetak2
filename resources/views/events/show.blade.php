@extends('layouts.master')

@section('title', 'Event:')

@section('content')
    <div class="container">
        <h1>{{ $event->name }}</h1>
        <h2>Type: <small>{{ $event->type }}</small></h2>
        <hr>
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#Players</th>
                <th>Status</th>
                <th>Started</th>
                <th>Finished</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{ count($event->users) }}</th>
                    <th>{{ $event->active ? 'active' : 'pending' }}</th>
                    <th>{{ $event->updated_at }}</th>
                    <th>{{ $event->deleted_at ? $event->deleted_at : 'in progress' }}</th>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('events.details', $event->id) }}" class="btn btn-primary">Details</a>
    </div>

@endsection