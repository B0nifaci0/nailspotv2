@extends('adminlte::page')

@section('title', 'Categorías')

@section('content_header')
    {{-- <a href="{{ route('admin.subcompetences.create') }}" class="btn btn-info  float-right" data-toggle="tooltip"
        title="Agregar"><i class="fas fa-plus"></i></a> --}}

    <h1 class="text-center text-bold ">Lista de categorías</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif
@section('css')
    <style>
        .tooltip {
            top: 0;
        }

    </style>
@endsection

<div class="card">
    <div class="card-body">
        <table class="table table-stripe">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th colspan="3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td width="10px">
                            <a href="{{ route('admin.subcompetences.index', [$competence, $category]) }}"
                                class="btn btn-success " data-toggle="tooltip" title="agregar"><i
                                    class="fas fa-plus"></i></a>
                        </td>
                        <td width="10px">
                            <form
                                action="{{ route('admin.competence.categories.delete', [$competence, $category]) }}">
                                @csrf
                                @method('delete')
                                <button class=" btn btn-danger" data-toggle="tooltip" title="Eliminar">
                                    <i class="fas fa-trash"></i></a>
                                </button>
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
    $(document).ready(function() {
        $(".alert").delay(3000).slideUp(300);
    });

    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@stop
