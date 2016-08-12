{!! Form::open(['class' => 'form-horizontal', 'role' => 'form' ],['route' => url('auth.register')]) !!}

    <div class="form-group">
        {!! Form::label('Name', 'Name', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('email', 'E-Mail Address', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::password('password', ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Confirm Password', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {!! Form::submit('Register', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
{!! Form::close() !!}