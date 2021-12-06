@extends('adminlte::page')

@section('title', 'Crear Criterio')

@section('content_header')
<h1 class="text-center text-bold">Crear Criterio</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-danger">
    {{(session('info'))}}
</div>
@endif

<div class="card">
    <div class="card-body">

        {!! Form::open(['method' => 'POST', 'route' => 'admin.criteria.store', 'class' => 'form-horizontal']) !!}
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
    $(document).ready(function(){
    $(".alert").delay(3000).slideUp(300);
    });

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stop 