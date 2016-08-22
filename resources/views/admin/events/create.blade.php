@extends('layouts.admin')

@section('title', 'Create New Title')

@section('content')
    {!! Form::open(['action' => 'Admin\EventController@store', 'role' => 'form', 'class' => 'form-horizontal']) !!}

    <div class="form-group">
        {!! Form::label('Name', 'Name:', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-4">
            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('type_list', 'Type:', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-4">
            {!! Form::select('type_list[]', $types, null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('playerNo', 'Number of Players:', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-4">
            {!! Form::selectRange('playerNo', 2, 10) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('random_chk', 'Randomize first round:', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-4">
            {!! Form::checkbox('random_chk', 'randomize', true) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {!! Form::submit('Generate', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>

    {!! Form::close() !!}
@endsection
