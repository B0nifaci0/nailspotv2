@extends('adminlte::page')

@section('title', 'Pruebita')

@section('content_header')
<h1>Editar usuario</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="h-5">Nombre: </h1>
        <p class="form-control">{{$user->name}}</p>
        <h1 class="h-5">Lista de Roles</h1>
        <strong>Permisos Actuales</strong>
        <ul>
            @foreach ($user->roles as $role)
            <li>{{$role->name}}</li>
            @endforeach
        </ul>
        <form method="POST" action="{{ route('admin.users.update',['user' => $user]) }}">
            @csrf
            @method('PATCH')
            @foreach ($roles as $role)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="roles[]" value="{{$role->id}}">
                <label class="form-check-label">{{$role->name}}</label>
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary mt-2">Asignar Rol</button>
        </form>
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