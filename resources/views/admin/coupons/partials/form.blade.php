<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('description') }}</small>
</div>
<div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
    {!! Form::label('code', 'Codigo') !!}
    {!! Form::text('code', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('code') }}</small>
</div>
<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
    {!! Form::label('type', 'Input label') !!}
    {!! Form::select('type', ['0'=> 'Valor', '1' => 'Porcentual'], null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('type') }}</small>
</div>
<div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
    {!! Form::label('discount', 'Descuento') !!}
    {!! Form::text('discount', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('discount') }}</small>
</div>
<div class="btn-group pull-right">
    {!! Form::reset("Limpiar", ['class' => 'btn btn-warning']) !!}
    {!! Form::submit("Aceptar", ['class' => 'btn btn-success ml-2']) !!}
</div>