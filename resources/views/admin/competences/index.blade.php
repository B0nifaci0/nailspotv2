@extends('adminlte::page')

@section('title', 'Competencias')

@section('content_header')
    <a href="{{ route('admin.competences.create') }}" class="float-right btn btn-info" data-toggle="tooltip"
        title="Nueva competencia"><i class="fas fa-plus"></i></a>
    <h1 class="text-center text-bold">Competencias</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
@section('css')
    <style>
        .tooltip {
            top: 0;
        }

    </style>
@endsection
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Creada por</th>
                    <th>Nombre</th>
                    <th>Categorias</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($competences as $competence)
                    <tr>
                        <td><img class="rounded-circle zoom" src="{{ $competence->teacher->profile_photo_url }}" />
                            {{ $competence->teacher->name }}
                        </td>
                        <td>{{ $competence->name }}</td>
                        <td>
                            @foreach ($competence->categories as $categories)
                                <li>{{ $categories->name }}</li>
                            @endforeach
                        </td>
                        <td>
                            @switch($competence->status)
                                @case(1)
                                    <span class='badge badge-danger'>Borrador</span>
                                @break
                                @case(2)
                                    <span class='badge badge-success'>Publicado</span>
                                @break
                                @case(3)
                                    <span class='badge badge-warning'>Finalizado</span>
                                @break
                            @endswitch
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <button id="btnOptions" type="button" class="btn btn-info dropdown-toggle"
                                    data-toggle="dropdown" aria-expanded="false">
                                    Opciones
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnOptions">
                                    <a class="dropdown-item" data-toggle="tooltip" title="Detalles"
                                        href='{{ route('admin.competences.show', $competence) }}'><i
                                            class="fa fa-eye mr-1"></i>Detalle</a>
                                    <a class="dropdown-item" data-toggle="tooltip" title="Editar"
                                        href='{{ route('admin.competences.edit', $competence) }}'><i
                                            class="fa fa-edit mr-1"></i>Editar</a>
                                    <form action="{{ route('admin.competences.destroy', $competence) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="dropdown-item" data-toggle="tooltip"
                                            title="Eliminar"><i class="fa fa-trash mr-1"></i>Eliminar</button>
                                    </form>
                                </div>
                            </div>
                            <div class="btn-group" role="group">
                                <button id="btnOthers" type="button" class="btn btn-primary dropdown-toggle"
                                    data-toggle="dropdown" aria-expanded="false">
                                    Otros
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnOthers">
                                    <a class="dropdown-item " data-toggle="tooltip" title="Categorías"
                                        href='{{ route('admin.competence.categories.index', $competence) }}'><i
                                            class="fas fa-layer-group mr-1"></i>Categorías</a>
                                    <a class="dropdown-item" data-toggle="tooltip" title="Ver PDF"
                                        href="{{ route('admin.reports.competences.score', $competence) }}"><i
                                            class="fas fa-file-pdf mr-1"></i>Ver PDF</a>
                                </div>
                            </div>
                        </td>
                        @if ($competence->end_date < \Carbon\Carbon::toDay()->toString())
                            <td>
                                <a href="{{ route('admin.select.winner', $competence) }}" class="btn btn-success">Seleccionar
                                    ganador</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{ $competences->links('vendor.pagination.bootstrap-4') }}
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

    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stop
