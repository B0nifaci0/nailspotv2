@extends('adminlte::page')

@section('title', 'Detalles de venta')

@section('content_header')
<h1>Detalles de venta</h1>
@stop

@section('content')
@livewire('admin.sale-details-competence', ['competence' => $competence])
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