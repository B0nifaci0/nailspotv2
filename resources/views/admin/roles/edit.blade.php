@extends('adminlte::page')

@section('title', 'Editar rol')

@section('content_header')
<h1>Editar Rol</h1>
@stop

@section('content')
@if (session('message'))
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Bien hecho!</h4>
    {{session('message')}}
</div>
@endif
<div class="card">
    <div class="card-body">
        {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'PUT', 'class' =>
        'form-horizontal']) !!}
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