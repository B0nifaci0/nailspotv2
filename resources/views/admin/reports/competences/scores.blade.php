@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>reporte</h1>
@stop

@section('content')
<div class='container-fluid'>
    <div class="row">
        <div class="col-">
            <table class="table">
                <tbody>
                    <tr>
                        <th>Criterios</th>
                    </tr>
                    <tr>
                        <th>Juez</th>
                    </tr>
                    <tr>
                        <th>competidor</th>
                    </tr>
                    @foreach ($scores->unique('competence_criterion_user_id') as $criterion)
                    <tr>
                        <th>{{$criterion}}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-">
            <table class="table">
                <tbody>
                    <tr>
                        @foreach ($scores->unique('competence_criterion_user_id') as $ccu)
                        <th>{{$ccu->competenceCriterionUser->criterion->name}}</th>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
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