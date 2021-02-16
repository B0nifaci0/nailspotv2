@extends('adminlte::page')

@section('title', 'Cursos pendientes de aprobacion')

@section('content_header')
<h1>Cursos pendientes de aprobacion</h1>
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
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td>{{$course->id}}</td>
                    <td>{{$course->name}}</td>
                    <td>{{$course->category->name}}</td>
                    <td>
                        <a href="{{route('admin.courses.show',$course)}}" class="btn btn-primary">Revisar</a>
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
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop