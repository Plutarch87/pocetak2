@extends('layouts.admin')

@section('title', 'Events')

@section('content')
<div class="container">
    <h1>Active Tournaments</h1>
    <hr>
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        @include('admin.partials.table')
        <tbody>
            @foreach($events as $event)
                <tr>
                    @include('admin.partials.tableCells')
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
    <hr>
<h1>Finished Tournaments</h1>
    <hr>
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        @include('admin.partials.table')
        <tbody>
            @foreach($events as $event)
                <tr>
                    @include('admin.partials.tableCells')
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
    <hr>
    <h1>Inactive Tournaments</h1>
    <hr>
    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        @include('admin.partials.table')
        <tbody>
            @foreach($events->where('deleted_at', !null) as $event)
                <tr>
                    @include('admin.partials.tableCells')
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
    <hr>
</div>

@endsection
