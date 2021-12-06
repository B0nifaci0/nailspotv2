@extends('adminlte::page')

@section('title', 'Lista de usuarios')


@section('content_header')
<h1 class="text-center text-bold">Lista de Usuarios</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-info" role="alert">
    {{(session('info'))}}
</div>
@endif

@section('css')
<style>
    .tooltip {
        top: 0;
    }
</style>
@endsection

@livewire('admin.users-index')
@stop

@section('js')
<script>
    $(document).ready(function(){
    $(".alert").delay(3000).slideUp(300);
    });

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stop