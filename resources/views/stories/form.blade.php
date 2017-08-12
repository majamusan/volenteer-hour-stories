<div class="form-group {{ $errors->has('project') ? 'has-error' : ''}}">
    {!! Form::label('project', 'Project', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('project', $projects, $stories->project,  ['class' => 'form-control']) !!}
        {!! $errors->first('project', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    {!! Form::label('date', 'Date', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('date', null, ['class' => 'form-control', 'placeholder' => 'YYYY/MM/DD']) !!}
        {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Description', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('hours') ? 'has-error' : ''}}">
    {!! Form::label('hours', 'Hours', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('hours', null, ['class' => 'form-control'  ]) !!}
        {!! $errors->first('hours', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-6"> </div>
    <div class="col-md-6"> {!! Form::submit('Save',['class'=> 'btn btn-primary']) !!} </div>
</div>
