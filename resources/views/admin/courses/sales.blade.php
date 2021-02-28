@extends('adminlte::page')

@section('title', 'Cursos Vendidos')

@section('content_header')
<h1>Cursos Vendidos</h1>
@stop

@section('content')
@livewire('admin.courses-details')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop