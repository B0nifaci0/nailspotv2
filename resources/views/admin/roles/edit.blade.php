@extends('adminlte::page')

@section('title', 'Pruebita')

@section('content_header')
<h1>Editar Rol</h1>
@stop

@section('content')
@if (session('message'))
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Bien hecho!</h4>
    {{session('message')}}
</div>
@endif
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.roles.update',['role' => $role]) }}">
            @csrf
            @method('PATCH')
            <label class=" col-form-label">Nombre</label>
            <input type="text" class="form-control . {{($errors->has('name') ? 'is-invalid' : '')}}" name="name"
                placeholder="Nombre ..." value="{{old('name',$role->name)}}">
            @error('name')
            <span class="invalid-feedback">
                <strong>{{$message}}</strong>
            </span>
            @enderror
            <strong>Permisos Actuales</strong>
            <br>
            <ul>
                @foreach ($role->permissions as $permission)
                <li>{{$permission->name}}</li>
                @endforeach
            </ul>

            @error('permissions')
            <small class="text-danger">
                <strong>{{$message}}</strong>
            </small>
            @enderror
            <div class="form-group">
                <select class="duallistbox" name="permissions[]" multiple="multiple">
                    @foreach ($permissions as $permission)
                    <option value="{{$permission->id}}">{{$permission->name}}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-success" type="submit">Agregar</button>
        </form>
    </div>
</div>
@stop

@section('css')
<link rel=" stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $('.duallistbox').bootstrapDualListbox({
filterPlaceHolder: "Filtro",
// moveSelectedLabel: "Mover Seleccionados",
moveAllLabel: "Agregar Todos",
removeSelectedLabel: "Eliminar Seleccionados",
removeAllLabel: "Eliminar Todos",
infoText: false
});            
</script>
@stop