@extends('adminlte::page')

@section('title', 'Editar competencia')

@section('content_header')
<form action="{{route('admin.publish',$competence)}}" method="POST">
    @csrf
    <button type="submit"
        class="btn btn-sm float-right @if($competence->status == 1) btn-success @else btn-danger @endif ">
        @switch($competence->status)
        @case(1)
        Publicar
        @break
        @case(2)
        Volver a borrador
        @break
        @endswitch
    </button>
</form>
<h1 class="text-center text-bold">Editar competencia</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        {!! Form::model($competence, ['route' => ['admin.competences.update', $competence], 'method' => 'PUT', 'class'
        => 'form-horizontal','files' => true]) !!}
        @include('admin.competences.partials.form')
        {!! Form::close() !!}
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