<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>
<div class="form-group">
    <strong>Permisos</strong>
    <div class="col-sm-offset-3 col-sm-9">
        @foreach ($permissions as $permission)
        <div class="checkbox{{ $errors->has('permissions') ? ' has-error' : '' }}">
            <label for="permissions[]">
                {!! Form::checkbox('permissions[]', $permission->id, null) !!} {{$permission->name}}
            </label>
        </div>
        @endforeach
        <small class="text-danger">{{ $errors->first('permissions') }}</small>
    </div>
</div>
<div class="btn-group pull-right">
    {!! Form::reset("Limpiar", ['class' => 'btn btn-warning ']) !!}
    {!! Form::submit('Aceptar', ['class' => 'btn btn-success ml-2']) !!}
</div>