@extends('adminlte::page')

@section('title', 'Nosotros')

@section('content_header')
<a href="{{route('admin.nosotros.create')}}" class="btn btn-info  float-right" data-toggle="tooltip" title="Agregar"><i class="fas fa-plus"></i></a>

<h1 class="text-center text-bold ">Informacion de nosotros</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-success">
    {{(session('info'))}}
</div>
@endif
@section('css')
    <style>
        .tooltip { top: 0; }
    </style>
@endsection
<div class="card">
    <div class="card-body">
        <table class="table table-stripe">
            <thead>
                <tr>
                    <th>Acerca de nosotros</th>
                    <th>Visión</th>
                    <th>Misión</th>
                    <th>Valores</th>
                    <th>¿Que hacemos?</th>
                    <th>¿Como lo hacemos?</th>
                    <th>Nustros Expertos</th>
                    <th>Experiencia Nailspot</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($nosotros as $nosotros) 
                <tr>
                    <td> {{$nosotros->about_us}} </td>
                    <td> {{$nosotros->vision}} </td>
                    <td> {{$nosotros->mision}} </td>
                    <td> {{$nosotros->valors}} </td>
                    <td> {{$nosotros->what_do}}</td>
                    <td> {{$nosotros->how_do}} </td>
                    <td> {{$nosotros->own_expert}} </td>
                    <td> {{$nosotros->exp_nailspot}} </td>
                    <td width="10px">
                        <a class="btn btn-secondary " data-toggle="tooltip" title="Editar"
                            href=" {{route('admin.nosotros.edit', $nosotros)}} "><i class="far fa-edit"></i></a>
                    </td>
                    <td width="10px">
                        <form action="{{route('admin.nosotros.destroy', $nosotros)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger " data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
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