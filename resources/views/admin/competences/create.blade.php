@extends('adminlte::page')

@section('title', 'Nueva competencia')

@section('content_header')
<h1 class="text-center text-bold">Nueva competencia</h1>
@stop
@section('content')
<div class="py-8 bg-purple-800">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                 {!! Form::open(['method' => 'POST', 'route' => 'admin.competences.store', 'class' => 'form-horizontal',
                'enctype' => 'multipart/form-data']) !!}
                @include('admin.competences.partials.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@stop
@section('js')
<script>
    $('.input-daterange').datepicker({
        language: "es",
        format: "yyyy-mm-dd"
    });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/25.0.0/classic/ckeditor.js"></script>
<script src="{{asset('js/admin/competences/form.js')}}">
</script>
@stop