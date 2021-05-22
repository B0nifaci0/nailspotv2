@extends('adminlte::page')

@section('title', 'Cursos pendientes de aprobacion')

@section('content_header')
<h1 class="text-bold text-center">Cursos pendientes de aprobacion</h1>
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
                @foreach ($courses as $course)
                <tr>
                    <td><img class="rounded-circle zoom" src="{{$course->teacher->profile_photo_url }}" />
                        {{$course->teacher->name}}
                    </td>
                    <td>{{$course->name}}</td>
                    <td>{{$course->category->name}}</td>
                    <td>
                        <a href="{{route('admin.courses.show',$course)}}" class="btn btn-info rounded">Revisar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer">
        {{$courses->links('vendor.pagination.bootstrap-4')}}
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
    console.log('Hi!'); 
</script>
@stop