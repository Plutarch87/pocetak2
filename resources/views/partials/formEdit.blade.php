<div class="form-group">
        {!! Form::label('Name', 'Name:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-4">
        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
    </div>
</div>

<div class="form-group">
        {!! Form::label('img', 'Select Image:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-4">
        {!! Form::file('img', old('img'), ['class' => 'form-control', 'alt' => $user->name]) !!}
        <div class="thumbnail col-sm-3">
            {!! Html::image($user->img) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
</div>