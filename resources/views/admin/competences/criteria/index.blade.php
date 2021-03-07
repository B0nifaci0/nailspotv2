@extends('adminlte::page')

@section('title', 'Competencias')

@section('content_header')
<button type="button" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#modal-default">
    Asignar Criterio </button>
<h1>Asigancion de criterios para {{$competence->name}}</h1>
@stop

@section('content')
@if(session('info'))
<div class="alert alert-success">
    {{session('info')}}
</div>
@endif
@if(session('warning'))
<div class="alert alert-warning">
    {{session('warning')}}
</div>
@endif
<div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Criterio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {!! Form::open(['method' => 'POST', 'route' => 'admin.competences.assign-judge', 'class' =>
            'form-horizontal']) !!}

            <div class="modal-body">
                <div class="col-sm form-group{{ $errors->has('judges') ? ' has-error' : '' }}">
                    {!! Form::label('user_id', 'Juez') !!}
                    {!! Form::select('user_id', $judges, null, ['id' => 'judges', 'class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('judges') }}</small>
                </div>
                <div class="col-sm form-group{{ $errors->has('criteria') ? ' has-error' : '' }}">
                    {!! Form::label('criterion_id', 'Criterio') !!}
                    {!! Form::select('criterion_id', $criteria, null, ['id' => 'criteria', 'class' => 'form-control'])
                    !!}
                    <small class="text-danger">{{ $errors->first('criteria') }}</small>
                </div>
                {!! Form::hidden('competence_id', $competence->id) !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                {!! Form::submit('Aceptar', ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Competencia</th>
                    <th>Juez</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($competence_criteria as $item)
                <tr>
                    <td>
                        {{$item->criterion->name}}
                    </td>
                    <td>
                        {{$item->user->name}}
                    </td>
                    <td width="10px">
                        <form action="{{route('admin.competences.criteria.destroy',$item->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop

@section(' css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    .zoom:hover {
        transform: scale(1.5);
    }
</style>
@stop

@section('js')
<script>
    $(document).ready(function(){
        $(".alert").delay(3000).slideUp(300);
        });
</script>
@stop