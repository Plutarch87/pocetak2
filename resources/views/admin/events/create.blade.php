@extends('layouts.admin')

@section('title', 'Create New Event')

@section('content')
    {!! Form::open(['route' => ['admin.events.store', Auth::user()->id], 'role' => 'form', 'class' => 'form-horizontal']) !!}
    <div class="form-group">
        {!! Form::label('players', 'Players:', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-4">
            {!! Form::select('players[]', $users, null, [ 'class' => 'form-control', 'multiple']) !!}
        </div>
    </div>
    @include('admin.partials.eventForm', ['submitTitle' => 'Create Tournament'])
    {!! Form::close() !!}
@endsection
