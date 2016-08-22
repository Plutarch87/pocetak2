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
@if(Auth::user()->isAdmin())
<div class="form-group">
    {!! Form::label('role_list', 'Grant a Role:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-4">
        {!! Form::select('role_list[]', $roles, null, ['id' => 'role_list', 'class' => 'form-control', 'multiple']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('role', 'Role(s):', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-4">
        <p class="form-control">
        @foreach($user->roles as $role)
            {!! $role->name !!},
        @endforeach
        </p>
    </div>
</div>

@endif

<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
</div>