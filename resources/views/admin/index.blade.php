@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Panel de administración.</h1>
@stop

@section('content')
<p>Bienvenido a este hermoso panel de administración.</p>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop