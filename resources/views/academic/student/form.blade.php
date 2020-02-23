<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('age') ? 'has-error' : ''}}">
    {!! Form::label('age', 'Age', ['class' => 'control-label']) !!}
    {!! Form::number('age', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('age', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('NumberIdentification') ? 'has-error' : ''}}">
    {!! Form::label('NumberIdentification', 'Numberidentification', ['class' => 'control-label']) !!}
    {!! Form::text('NumberIdentification', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('NumberIdentification', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('TyoeIdentification') ? 'has-error' : ''}}">
    {!! Form::label('TyoeIdentification', 'Tyoeidentification', ['class' => 'control-label']) !!}
    {!! Form::text('TyoeIdentification', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('TyoeIdentification', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
