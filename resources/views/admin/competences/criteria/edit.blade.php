@extends('adminlte::page')

@section('title', 'Asignar criterios')

@section('content_header')
<h1>Asignar criterios</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::model($competence, ['route' => ['admin.competences.update-criteria', $competence], 'method' => 'PUT',
        'class' =>
        'form-horizontal']) !!}
        @include('admin.competences.criteria.partials.form')
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
<link rel=" stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
@stop