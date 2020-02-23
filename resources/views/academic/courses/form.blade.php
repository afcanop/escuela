<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Nombre', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' === 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('slug') ? 'has-error' : ''}}">
    {!! Form::label('slug', 'Slug', ['class' => 'control-label']) !!}
    {!! Form::text('slug', null, ('' === 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('course_image') ? 'has-error' : ''}}">
    {!! Form::label('course_image', 'Imagen', ['class' =>'control-label']) !!}
    {!! Form::text('course_image', null, ('' === 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('course_image', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('dateStart') ? 'has-error' : ''}}">
    {!! Form::label('dateStart', 'Fecha inicio', ['class' => 'control-label']) !!}
    {!! Form::date('dateStart', null, ('' === 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('dateStart', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('dateEnd') ? 'has-error' : ''}}">
    {!! Form::label('dateEnd', 'Fecha fin', ['class' => 'control-label']) !!}
    {!! Form::date('dateEnd', null, ('' === 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('dateStart', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('dateEnd') ? 'has-error' : ''}}">
    {!! Form::label('status', 'estado', ['class' => 'control-label']) !!}
    {!! Form::checkbox('status', null, ('' === 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', 'Descripcón', ['class' => 'control-label']) !!}
    {!! Form::text('description', null, ('' === 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    {!! Form::submit($formMode == 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
