@extends('adminlte::page')

@section('title', 'Editar Cupón')

@section('content_header')
<h1>Editar Cupon</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-primary">
    {{(session('info'))}}
</div>
@endif
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('admin.coupons.update',['coupon' => $coupon]) }}">
            @csrf
            @method('PATCH')
            <label class=" col-form-label">Descripcion</label>
            <input type="text" class="form-control . {{($errors->has('description') ? 'is-invalid' : '')}}"
                name="description" placeholder="Descripción ..." value="{{old('description')}}">
            @error('description')
            <span class="invalid-feedback">
                <strong>{{$message}}</strong>
            </span>
            @enderror
            <label class=" col-form-label">Codigo</label>
            <input type="text" class="form-control . {{($errors->has('code') ? 'is-invalid' : '')}}" name="code"
                placeholder="Codigo ..." value="{{old('code')}}">
            @error('code')
            <span class="invalid-feedback">
                <strong>{{$message}}</strong>
            </span>
            @enderror
            <label class=" col-form-label">Tipo</label>
            <select name="type" id="" class="form-control">
                <option value="0">Valor</option>
                <option value="1">Porcentual</option>
            </select>
            <label class=" col-form-label">Descuento</label>
            <input type="text" class="form-control . {{($errors->has('discount') ? 'is-invalid' : '')}}" name="discount"
                placeholder="Nombre ..." value="{{old('discount')}}">
            @error('discount')
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