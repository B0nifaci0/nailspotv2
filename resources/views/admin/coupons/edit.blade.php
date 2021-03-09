@extends('adminlte::page')

@section('title', 'Editar Cupón')

@section('content_header')
<h1>Editar Cupon</h1>
@stop

@section('content')

@if (session('info'))
<div class="alert alert-primary">
    {{(session('info'))}}
</div>
@endif
<div class="card">
    <div class="card-body">
        {!! Form::model($coupon, ['route' => ['admin.coupons.update', $coupon], 'method' => 'PUT']) !!}
        @include('admin.coupons.partials.form')
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop