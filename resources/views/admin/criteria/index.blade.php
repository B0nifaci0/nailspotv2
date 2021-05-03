@extends('adminlte::page')

@section('title', 'Criterios')

@section('content_header')
<a href="{{route('admin.criteria.create')}}" class="btn btn-info float-right" data-toggle="tooltip" title="Nuevo Criterio"><i class="fas fa-plus"></i></a>

<h1 class="text-center text-bold">Lista de criterios</h1>
@stop

@section('content')
@if (session('info'))
<div class="alert alert-primary">
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
                    <th>Id</th>
                    <th>Nombre</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($criteria as $criterion)
                <tr>
                    <td>{{$criterion->id}}</td>
                    <td>{{$criterion->name}}</td>
                    <td width="10px">
                        <a class="btn btn-secondary " data-toggle="tooltip" title="Editar"
                            href="{{route('admin.criteria.edit', $criterion)}}"><i class="far fa-edit"></i></a>
                    </td>
                    <td width="10px">
                        <form action="{{route('admin.criteria.destroy',$criterion)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger" data-toggle="tooltip" title="Eliminar"><i class="fas fa-trash"></i></button>
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