@extends('adminlte::page')

@section('title', 'Nueva competencia')

@section('content_header')
<h1 class="text-center text-bold">Cre</h1>
@stop
@section('content')
<div class="card">
    <div class="card-body">

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