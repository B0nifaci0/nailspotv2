@extends('adminlte::page')

@section('title', 'Nueva competencia')

@section('content_header')
<h1>Nueva competencia</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        {!! Form::open(['method' => 'POST', 'route' => 'admin.competences.store', 'class' => 'form-horizontal',
        'enctype' => 'multipart/form-data']) !!}
        @include('admin.competences.partials.form')
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')

@stop

@section('js')
<script>
    $('.input-daterange').datepicker({
        language: "es",
        dateFormat: "dd-mm-YY"
    });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
<script src="{{asset('js/instructor/courses/form.js')}}">
</script>
@stop