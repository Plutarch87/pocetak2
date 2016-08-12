{!! Form::open(['class' => 'form-horizontal', 'role' => 'form' ],['url' => url('password/email')]) !!}

    <div class="form-group">
        {!! Form::label('email', 'E-Mail Address', ['class' => 'col-md-4 control-label']) !!}
        <div class="col-md-6">
            {!! Form::text('email', old('email'), ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            {!! Form::submit('Send Password Reset Link', ['class' => 'btn btn-primary']) !!}
        </div>
    </div>
{!! Form::close() !!}