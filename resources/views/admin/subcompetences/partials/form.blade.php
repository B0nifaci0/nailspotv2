<div class="grid grid-cols-1 md:grid-cols-12">
    <div class="col-span-8">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('name') }}</small>
        </div>
        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
            {!! Form::label('description', 'Descripcion') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('description') }}</small>
        </div>
        <div class="col-sm form-group{{ $errors->has('price') ? ' has-error' : '' }}">
            {!! Form::label('price', 'Precio') !!}
            {!! Form::text('price', null, ['class' => 'form-control']) !!}
            <small class="text-danger">{{ $errors->first('price') }}</small>
        </div>
        <div class="checkbox{{ $errors->has('permissions') ? ' has-error' : '' }}">
            @foreach ($levels as $level)
                <label for="levels[]">
                    {!! Form::checkbox('levels[]', $level->id, null) !!} {{ $level->name }}
                </label>
            @endforeach
        </div>
        <small class="text-danger">{{ $errors->first('levels') }}</small>
    </div>
</div>
<div class="btn-group pull-right">
    {!! Form::reset('Limpiar', ['class' => 'btn btn-warning']) !!}
    {!! Form::submit('Aceptar', ['class' => 'btn btn-success ml-2']) !!}
</div>
