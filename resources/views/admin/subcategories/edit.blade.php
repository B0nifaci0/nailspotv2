@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')
<h1>Editar Categoria</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        {!! Form::model($subcategory, ['route' => ['admin.subcategories.update', $subcategory], 'method' => 'PUT', 'class' =>
        'form-horizontal']) !!}
        @include('admin.subcategories.partials.form')
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