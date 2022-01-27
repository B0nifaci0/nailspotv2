@extends('adminlte::page')

@section('title', 'Competencias')

@section('content_header')
    <h1 class="text-center text-bold">Ganadores de {{ $subcompetence->name }}</h1>
@stop
@section('content')
@section('css')
    <style>
        .tooltip {
            top: 0;
        }

    </style>

@endsection
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Calificación</th>
                    <th>Nivel</th>
                </tr>
            </thead>
            <tbody>                
                @foreach ($w as $item)
                        <tr>
                            <td>{{ $item->subcompetenceUser->user->name }}</td>
                            <td>{{ $item->subcompetenceUser->user->email }}</td>
                            <td>{{ $item->value }}</td>
                            <td>{{ $item->subcompetenceUser->level->name }}</td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop
@section('js')
<script>
    $(document).ready(function() {
        $(".alert").delay(3000).slideUp(300);
    });

    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stop
