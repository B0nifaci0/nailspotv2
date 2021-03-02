@extends('adminlte::page')

@section('title', 'Crear categoria')

@section('content_header')
<h1>Crear categoria</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        {!! Form::open(['method' => 'POST', 'route' => 'admin.categories.store', 'class' => 'form-horizontal']) !!}
        @include('admin.categories.partials.form')
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