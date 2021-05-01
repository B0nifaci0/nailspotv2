@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Inicio</h1>
@stop

@section('content')
<p>Bienvenido al panel de administración.</p>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop