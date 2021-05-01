@extends('adminlte::page')

@section('title', 'Crear nivel')

@section('content_header')
<h1 class="text-center text-bold">Crear Nivel</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        {!! Form::open(['method' => 'POST', 'route' => 'admin.levels.store', 'class' => 'form-horizontal']) !!}
        @include('admin.levels.partials.form')
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