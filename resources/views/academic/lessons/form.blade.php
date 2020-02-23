<div class="form-group{{ $errors->has('title') ? 'has-error' : ''}}">
    {!! Form::label('title', 'Title', ['class' => 'control-label']) !!}
    {!! Form::text('title', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('content') ? 'has-error' : ''}}">
    {!! Form::label('content', 'Content', ['class' => 'control-label']) !!}
    {!! Form::text('content', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('slug') ? 'has-error' : ''}}">
    {!! Form::label('slug', 'Slug', ['class' => 'control-label']) !!}
    {!! Form::text('slug', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('slug', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('slug') ? 'has-error' : ''}}">
    {!! Form::label('lesson_image', 'lesson_image', ['class' => 'control-label']) !!}
    {!! Form::text('lesson_image', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('lesson_image', '<p class="help-block">:message</p>') !!}
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
    {!! Form::checkbox('status',  true) !!}


    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
