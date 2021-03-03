@extends('adminlte::page')

@section('title', 'Crear Criterio')

@section('content_header')
<h1>Crear Criterio</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">

        {!! Form::open(['method' => 'POST', 'route' => 'admin.criteria.store', 'class' => 'form-horizontal']) !!}
        @include('admin.criteria.partials.form')
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