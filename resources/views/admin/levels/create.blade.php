@extends('adminlte::page')

@section('title', 'Crear nivel')

@section('content_header')
<h1>Crear Nivel</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.levels.store') }}"">
                @csrf
            <label class=" col-form-label">Nombre</label>
            <input type="text" class="form-control . {{($errors->has('name') ? 'is-invalid' : '')}}" name="name"
                placeholder="Nombre ..." value="{{old('name')}}">
            @error('name')
            <span class="invalid-feedback">
                <strong>{{$message}}</strong>
            </span>
            @enderror
            <button class="btn btn-primary mt-3" type="submit">Agregar</button>
        </form>
    </div>
</div>
@stop

@section('css')
<link rel=" stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop