@extends('adminlte::page')

@section('title', 'Lista de usuarios')


@section('content_header')
<h1 class="text-bold text-center">Lista de Usuarios</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-primary">
    {{(session('info'))}}
</div>
@endif
@livewire('admin.users-index')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    $(document).ready(function(){
    $(".alert").delay(3000).slideUp(300);
    });
</script>
@stop