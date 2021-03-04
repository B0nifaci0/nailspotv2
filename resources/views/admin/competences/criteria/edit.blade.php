@extends('adminlte::page')

@section('title', 'Administrar criterios')

@section('content_header')
<h1>Administrar criterios de {{$competence->name}}</h1>
@stop

@section('content')

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
            <div class="modal-body">
                <div class="col-sm form-group{{ $errors->has('users') ? ' has-error' : '' }}">
                    {!! Form::label('users', 'Juez') !!}
                    {!! Form::select('users', $users, null, ['id' => 'users', 'class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('users') }}</small>
                </div>
                <div class="col-sm form-group{{ $errors->has('score') ? ' has-error' : '' }}">
                    {!! Form::label('score', 'Valor en competencia') !!}
                    {!! Form::selectRange('score', 1, 10, ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('score') }}</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </div>
    </div>
</div>

<div class="timeline">
    @foreach ($competence->criteria as $criterion)
    <div>
        <i class="fas fa-gavel bg-blue"></i>
        <div class="timeline-item">
            <h3 class="timeline-header ">{{$criterion->name}}</h3>

            <div class="timeline-body">
                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                quora plaxo ideeli hulu weebly balihoo...
            </div>
            <div class="timeline-footer">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-default">
                    Editar </button>
            </div>
        </div>
    </div>
    @endforeach

    @stop

    @section('css')

    @stop

    @section('js')


    @stop