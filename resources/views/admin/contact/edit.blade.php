@extends('adminlte::page')

@section('title', 'Editar Contacto')

@section('content_header')
<h1 class="text-center text-bold">Editar Contacto</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($contact, ['route' => ['admin.message.contact.update', $contact], 'method' => 'PATCH', 'class' =>
        'form-horizontal']) !!}
        @include('admin.contact.partials.form')
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

