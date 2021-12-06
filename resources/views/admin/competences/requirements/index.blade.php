@extends('adminlte::page')

@section('title', 'Competencias')

@section('content_header')
    <button type="button" class="float-right btn btn-secondary btn-sm" data-toggle="modal" data-target="#modal-default">
        Asignar Requerimiento </button>
    <h1 class="text-center text-bold">Requerimientos previos para: {{ $competence->name }}</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif

    <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center modal-title text-bold" id="exampleModalLabel">Agregar Requerimiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                {!! Form::open(['method' => 'POST', 'route' => 'admin.competences.requirements.store', 'class' => 'form-horizontal']) !!}
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    {!! Form::label('description', 'Descripcion') !!}
                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                    <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>
                {!! Form::hidden('competence_id', $competence->id) !!}

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
                        <th>Descripción</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($requirements as $requirement)
                        <tr>
                            <td>
                                {{ $requirement->description }}
                            </td>
                            <td width="10px">
                                <form action="{{ route('admin.competences.requirements.destroy', $requirement->id) }}"
                                    method="POST">
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
        $(document).ready(function() {
            $(".alert").delay(3000).slideUp(300);
        });
    </script>
@stop
