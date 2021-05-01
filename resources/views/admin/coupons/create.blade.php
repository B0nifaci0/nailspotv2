@extends('adminlte::page')

@section('title', 'Nuevo Cupón')

@section('content_header')
<h1 class="text-bold text-center">Nuevo Cupón</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        {!! Form::open(['method' => 'POST', 'route' => 'admin.coupons.store', 'class' => 'form-horizontal']) !!}
        @include('admin.coupons.partials.form')
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
<link rel=" stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop