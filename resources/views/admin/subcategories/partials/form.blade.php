<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>
<div class="btn-group pull-right">
    {!! Form::reset("Limpiar", ['class' => 'btn btn-warning']) !!}
    {!! Form::submit('Aceptar', ['class' => 'btn btn-success ml-2']) !!}
</div>