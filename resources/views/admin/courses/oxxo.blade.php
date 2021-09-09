@extends('adminlte::page')

@section('title', 'Cursos Vendidos')

@section('content_header')
<h1 class="text-center text-bold">Pagos OXXO</h1>
@stop

@section('content')
@livewire('admin.courses-oxxo')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    .zoom:hover {
        transform: scale(1.5);
    }
</style>
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop