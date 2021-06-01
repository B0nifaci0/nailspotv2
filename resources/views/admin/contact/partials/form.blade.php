<div class="form-group{{ $errors->has('ubication') ? ' has-error' : '' }}">
    {!! Form::label('ubication', 'Ubicación') !!}
    {!! Form::text('ubication', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('ubication') }}</small>
</div>
<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
    {!! Form::label('phone', 'Telefono') !!}
    {!! Form::number('phone', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('phone') }}</small>
</div>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Correo') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('email') }}</small>
</div>
<div class="form-group{{ $errors->has('facebook') ? ' has-error' : '' }}">
    {!! Form::label('facebook', 'URL Facebook') !!}
    {!! Form::url('facebook', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('facebook') }}</small>
</div>
<div class="form-group{{ $errors->has('instagram') ? ' has-error' : '' }}">
    {!! Form::label('instagram', 'URL Instagram') !!}
    {!! Form::url('instagram', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('instagram') }}</small>
</div>
<div class="form-group{{ $errors->has('youtube') ? ' has-error' : '' }}">
    {!! Form::label('youtube', 'URL Youtube') !!}
    {!! Form::url('youtube', null, ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('youtube') }}</small>
</div>
<div class="btn-group pull-right">
    {!! Form::reset("Limpiar", ['class' => 'btn btn-warning']) !!}
    {!! Form::submit('Aceptar', ['class' => 'btn btn-success ml-2']) !!}
</div>