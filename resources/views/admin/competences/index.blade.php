@extends('adminlte::page')

@section('title', 'Competencias')

@section('content_header')
<a href="{{route('admin.competences.create')}}" class="btn btn-secondary btn-sm float-right">Nueva Competencia</a>
<h1>Competencias</h1>
@stop

@section('content')
@if(session('info'))
<div class="alert alert-success">
    {{session('info')}}
</div>
@endif

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Profesor</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
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
                        <a class="btn btn-primary" href='{{ route('admin.competences.edit',$competence) }}'>Editar</a>
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

@section('css')
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