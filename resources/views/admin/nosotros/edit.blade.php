@extends('adminlte::page')

@section('title', 'Editar informacion')

@section('content_header')
<h1 class="text-center text-bold">Editar informacion</h1>
@stop
@section('content')
@if (session('info'))
<div class="alert alert-success" role="alert">
    {{(session('info'))}}
</div>
@endif
<div class="card">
    <div class="card-body">
        {!! Form::model($nosotros, ['route' => ['admin.nosotros.update', $nosotros], 'method' => 'PUT', 'class'
        => 'form-horizontal','files' => true]) !!}
        @include('admin.nosotros.partials.form')
        {!! Form::close() !!}
    </div>
</div>
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
<script src="{{asset('js/admin/competences/form.js')}}">
</script>
@stop
