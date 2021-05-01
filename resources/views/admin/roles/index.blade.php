@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
<h1 class="text-center text-bold">Lista de roles</h1>
@stop

@section('content')
@if (session('message'))
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Bien hecho!</h4>
    {{session('message')}}
</div>
@endif

<div class="card">

    <div class="card-header text-right text-bold text-lg">
        <a href="{{route('admin.roles.create')}}"><i class="fas fa-plus"></i></a>
    </div>
    <div class="card-body ">
        <table class="table  table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($roles as $role)
                <tr>
                    <td>{{$role->id}}</td>
                    <td>{{$role->name}}</td>
                    <td width="10px">
                        <a class="btn btn-secondary" href="{{route('admin.roles.edit',$role->id)}}"><i class="far fa-edit"></i></a>
                    </td>
                    <td width="10px">
                        <form action="{{route('admin.roles.destroy',$role)}}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">
                        No hay roles registrados.
                    </td>
                    @endforelse
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
    $(document).ready(function(){
    $(".alert").delay(3000).slideUp(300);
    });
</script>
@stop