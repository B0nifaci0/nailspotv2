@extends('adminlte::page')

@section('title', 'Subcompetences')

@section('content_header')
    <a href="{{ route('admin.subcompetences.create', [$competence, $category]) }}" class="btn btn-info  float-right"
        data-toggle="tooltip" title="Agregar"><i class="fas fa-plus"></i></a>

    <h1 class="text-center text-bold ">Subcompetencias</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
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
        <table class="table table-stripe">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Niveles</th>
                    <th colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subcompetences as $subcompetence)
                    <tr>
                        <td>{{ $subcompetence->name }}</td>
                        <td>{{ strip_tags($subcompetence->description) }}</td>
                        <td>${{ $subcompetence->price }}</td>
                        <td>
                            @foreach ($subcompetence->levels as $level)
                                <li>{{ $level->name }}</li>
                            @endforeach
                        </td>
                        <td width="10px">
                            <a class="btn btn-secondary " data-toggle="tooltip" title="Editar"
                                href='{{ route('admin.subcompetences.edit', [$competence, $category, $subcompetence]) }}'><i
                                    class="far fa-edit"></i></a>
                        </td>
                        <td width="10px">
                            <a class="btn btn-dark " data-toggle="tooltip" title="Criterios"
                                href='{{ route('admin.subcompetences.index-criteria',[$competence, $category, $subcompetence]) }}'><i
                                    class="fas fa-gavel"></i></a>
                        </td>
                        <td width="10px">
                            <a href='{{ route('admin.subcompetences.destroy', [$competence, $category, $subcompetence]) }}'
                                class="btn btn-danger " data-toggle="tooltip" title="Eliminar" href=''><i
                                    class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
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
