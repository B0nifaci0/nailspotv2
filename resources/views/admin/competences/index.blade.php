@extends('adminlte::page')

@section('title', 'Competencias')

@section('content_header')
<a href="{{route('admin.competences.create')}}" class="btn btn-info float-right" data-toggle="tooltip" title="Nueva competencia"><i class="fas fa-plus"></i></a>
<h1 class="text-center text-bold">Competencias</h1>
@stop

@section('content')
@if(session('info'))
<div class="alert alert-success">
    {{session('info')}}
</div>
@endif
@section('css')
    <style>
        .tooltip { top: 0; }
    </style>
@endsection
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Creado por</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Estatus</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($competences as $competence)
                <tr>
                    <td><img class="rounded-circle zoom" src="{{$competence->teacher->profile_photo_url }}" />
                        {{$competence->teacher->name}}
                    </td>
                    <td>{{$competence->name}}</td>
                    <td>{{$competence->subcategory->name}}</td>
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

                    <td width="10px">
                        <a class="btn btn-secondary " data-toggle="tooltip" title="Editar"
                            href='{{ route('admin.competences.edit',$competence) }}'><i class="far fa-edit"></i></a>
                    </td>
                    <td width="10px">
                        <a class="btn btn-dark " data-toggle="tooltip" title="Criterios"
                            href='{{ route('admin.competences.index-criteria',$competence) }}'><i class="fas fa-gavel"></i></a>
                    </td>
                    <td width="10px">
                        <form action="{{route('admin.competences.destroy',$competence)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                    <td>
                        <a class='btn btn-danger ' data-toggle="tooltip" title="Ver PDF"
                            href="{{ route('admin.reports.competences.score', $competence) }}"><i
                                class="fas fa-file-pdf"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{$competences->links('vendor.pagination.bootstrap-4')}}
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

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stop