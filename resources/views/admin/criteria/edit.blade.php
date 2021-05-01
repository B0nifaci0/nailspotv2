@extends('adminlte::page')

@section('title', 'Editar Criterio')

@section('content_header')
<h1 class="text-center text-bold">Editar Criterio</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        {!! Form::model($criterion, ['route' => ['admin.criteria.update', $criterion], 'method' => 'PUT', 'class' =>
        'form-horizontal']) !!}
        @include('admin.criteria.partials.form')
        {!! Form::close() !!}
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