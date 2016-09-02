<div class="form-group">
    {!! Form::label('Name', 'Name:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-4">
        {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('players', 'Players:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-4">
        {!! Form::select('players[]', $users, null, [ 'class' => 'form-control', 'multiple']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('type', 'Type:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-4">
        {!! Form::select('type', trans('types.types'), null, [ 'class' => 'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('random_chk', 'Randomize first round:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-4">
        {!! Form::checkbox('random_chk', 'randomize' ,true) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('active', 'Active:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-4">
        Yes: {!! Form::radio('active', true, true) !!}
        No: {!! Form::radio('active', false) !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-md-offset-4">
        {!! Form::submit($submitTitle, ['class' => 'btn btn-primary']) !!}
    </div>
</div>