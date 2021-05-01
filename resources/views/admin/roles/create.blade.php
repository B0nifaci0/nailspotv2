@extends('adminlte::page')

@section('title', 'Crear rol')

@section('content_header')
<h1 class="text-bold text-center ">Crear rol</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.roles.store']) !!}
        @include('admin.roles.partials.form')
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
<link rel=" stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
@stop