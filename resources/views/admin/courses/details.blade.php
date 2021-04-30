@extends('adminlte::page')

@section('title', 'Detalles de venta')

@section('content_header')
<h1 class="text-bold text-center">Detalles de venta</h1>
@stop

@section('content')

<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$course->sales->count()}}</h3>
                <p>Vendidos</p>
            </div>
            <div class="icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>${{$course->total}}</h3>
                <p>Total recaudado</p>
            </div>
            <div class="icon">
                <i class="fas fa-chart-pie"></i>
            </div>

        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small card -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>${{$course->price}}</h3>
                <p>Precio Real</p>
            </div>
            <div class="icon">
                <i class="fas fa-arrow-circle-right"></i>
            </div>

        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
                <a href="{{ route('admin.reports.course.details', $course) }}" >
                    Generar Reporte 
                </a>
            <div class="icon">
                <i class="fas fa-file-pdf"></i>
            </div>
        </div>
    </div>
</div>

@livewire('admin.sale-details', ['course' => $course])
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    .zoom:hover {
        transform: scale(1.5);
    }
</style>
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop