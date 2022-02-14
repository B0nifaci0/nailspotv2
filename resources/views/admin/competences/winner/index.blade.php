@extends('adminlte::page')

@section('title', 'Competencias')

@section('content_header')
    <h1 class="text-center text-bold">Subcompetencias</h1>
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
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subcompetences as $subcompetence)
                    <tr>
                        <td>{{ $subcompetence->name }}</td>
                        <td>{{ strip_tags($subcompetence->description) }}</td>
                        <td>${{ $subcompetence->price }}</td>
                        <td>
                            <form action="{{route('admin.winner.selectWinner', [$subcompetence])}}" method="post">
                                @csrf
                                <select name="level">
                                    @foreach ($subcompetence->levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                    @endforeach
                                </select>
                                <button class="btn btn-success">Selecionar ganador</button>
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
    $(document).ready(function() {
        $(".alert").delay(3000).slideUp(300);
    });

    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stop
