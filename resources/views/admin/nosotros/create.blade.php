@extends('adminlte::page')

@section('title', 'Informacion de nosotros')

@section('content_header')
<h1 class="text-center text-bold">Agregar Informacion</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        {!! Form::open(['method' => 'POST', 'route' => 'admin.nosotros.store', 'class' => 'form-horizontal']) !!}
        @include('admin.nosotros.partials.form')
        {!! Form::close() !!}
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