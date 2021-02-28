@extends('adminlte::page')

@section('title', 'Detalles de venta')

@section('content_header')
<h1>Detalles de venta</h1>
@stop

@section('content')
@livewire('admin.sale-details', ['course' => $course])
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop