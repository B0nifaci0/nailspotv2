@extends('adminlte::page')

@section('title', 'Niveles')

@section('content_header')
<a href="{{route('admin.levels.create')}}" class="btn btn-info  float-right" data-toggle="tooltip" title="Nuevo nivel"><i class="fas fa-plus"></i></a>

<h1 class="text-bold text-center">Lista de niveles</h1>
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
                @foreach ($levels as $level)
                <tr>
                    <td>{{$level->id}}</td>
                    <td>{{$level->name}}</td>
                    <td width="10px">
                        <a class="btn btn-secondary " data-toggle="tooltip" title="Editar" href="{{route('admin.levels.edit', $level)}}"><i class="far fa-edit"></i></a>
                    </td>
                    <td width="10px">
                        <form action="{{route('admin.levels.destroy',$level)}}" method="POST">
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