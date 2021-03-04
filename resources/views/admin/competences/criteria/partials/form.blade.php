<div class="form-group">
    <label for="">Competencia</label>
    <input type="text" name="competence_id" value="{{$competence->id}}" class='d-none'>
    <h1 class='form-control'>{{$competence->name}}</h1>
</div>
<div class="form-group">
    <strong>Criterios</strong>
    <div class="col-sm-offset-3 col-sm-9">
        @foreach ($criteria as $criterion)
        <div class="checkbox{{ $errors->has('criteria') ? ' has-error' : '' }}">
            <label for="criterion[]">
                {!! Form::checkbox('criteria[]', $criterion->id, null) !!} {{$criterion->name}}
            </label>
        </div>
        @endforeach
        <small class="text-danger">{{ $errors->first('criteria') }}</small>
    </div>
</div>
<div class="btn-group pull-right">
    {!! Form::reset("Limpiar", ['class' => 'btn btn-warning ']) !!}
    {!! Form::submit('Aceptar', ['class' => 'btn btn-success ml-2']) !!}
</div>