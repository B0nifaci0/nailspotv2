@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$student}}</h3>
                <p>Alumnos inscritos</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$courses->count()}}</h3>
                <p>Cursos Publicados</p>
            </div>
            <div class="icon">
                <i class="fa fa-book"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-light">
            <div class="inner">
                <h3>{{$totalInstructor}}</h3>
                <p>Instructores</p>
            </div>
            <div class="icon">
                <i class="fa fa-user-circle"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>${{$totalCourse}}</h3>
                <p>Cursos Vendidos</p>
            </div>
            <div class="icon">
                <i class="fa fa-credit-card"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>${{$totalCompetence}}</h3>
                <p>Competencias Vendidas</p>
            </div>
            <div class="icon">
                <i class="fa fa-credit-card"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$allCompetences->count()}}</h3>
                <p>Competencias Publicadas</p>
            </div>
            <div class="icon">
                <i class="fa fa-puzzle-piece"></i>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-dark">
            <div class="inner">
                <h3>{{$judge}}</h3>
                <p>Jueces</p>
            </div>
            <div class="icon">
                <i class="fa fa-university"></i>
            </div>
        </div>
    </div>
</div>

@stop

@section('content')
@if ($valorCourse)
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-2 col-md-6 bg-white rounded pb-4">
            <h3 class="text-center pt-4">Cursos más populares</h3>
            <canvas id="courses-container"></canvas>
        </div>
        <div class="col-sm-2 col-md-6 bg-white rounded pb-4">
            <h3 class="text-center pt-4">Ventas por mes</h3>
            <canvas id="sales-container"></canvas>
        </div>
    </div>
    <br><br>
</div>
@endif
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('courses-container').getContext('2d');
    let nameCourse={!!json_encode($nameCourse)!!};
    let valorCourse={!!json_encode($valorCourse)!!};
    var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: nameCourse,
        datasets: [{
            label: 'Alumnos',
            data: valorCourse,
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 5
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>
<script>
    var ctx = document.getElementById('sales-container').getContext('2d');
    let months={!!json_encode($date)!!};
    let sales={!!json_encode($sales)!!};
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: months,
        datasets: [{
            label: 'Pesos',
            data: sales,
            backgroundColor: [
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 99, 132, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 5
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: false
            }
        }
    }
});
</script>
@stop