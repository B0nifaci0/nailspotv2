@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')
<h1>Editar Categoria</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-primary">
    {{(session('info'))}}
</div>
@endif
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.categories.update',['category' => $category]) }}">
            @csrf
            @method('PATCH')
            <label class=" col-form-label">Nombre</label>
            <input type="text" class="form-control . {{($errors->has('name') ? 'is-invalid' : '')}}" name="name"
                placeholder="Nombre ..." value="{{old('name',$category->name)}}">
            @error('name')
            <span class="invalid-feedback">
                <strong>{{$message}}</strong>
            </span>
            @enderror
            <button class="btn btn-primary mt-3" type="submit">Actualizar</button>
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