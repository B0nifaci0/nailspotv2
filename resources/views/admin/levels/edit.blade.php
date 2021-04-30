@extends('adminlte::page')

@section('title', 'Editar Nivel')

@section('content_header')
<h1 class="text-bold text-center">Editar nivel</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-primary">
    {{(session('info'))}}
</div>
@endif
<div class="card">
    <div class="card-body">
        {!! Form::model($level, ['route' => ['admin.levels.update', $level], 'method' => 'PUT', 'class' =>
        'form-horizontal']) !!}
        @include('admin.levels.partials.form')
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