@extends('adminlte::page')

@section('title', 'Mensajes')


@section('content_header')
<a href="{{route('admin.message.contact.edit', $contact[0])}}" class="btn btn-info  float-right" data-toggle="tooltip" title="Configuración"><i class="fa fa-cog"></i></a>
<h1 class="text-bold text-center">Mensajes</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-primary">
    {{(session('info'))}}
</div>
@endif
@livewire('admin.show-message')
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
