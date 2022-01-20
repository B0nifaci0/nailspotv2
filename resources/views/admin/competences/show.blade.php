@extends('adminlte::page')

@section('title', 'Competencias')

@section('content_header')
    <h1 class="text-center text-bold">Competencia - {{ $competence->name }}</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    @endif
@section('css')
    <style>
        .tooltip {
            top: 0;
        }

    </style>
@endsection
<div class="container-fluid">
    <div class="card overflow-hidden">
        <img id="picture" src="{{ $competence->image->url }}" class="picture">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <figure class="overflow-hidden embed-responsive embed-responsive embed-responsive-16by9">
                        {!! $competence->iframe !!}
                    </figure>
                </div>
                <div class="col-sm-12 col-md-6 px-5">
                    <div class="d-flex d-flex-row mb-3">
                        <h2>{{ $competence->name }}</h2>
                    </div>
                    <div class="d-flex d-flex-row"> 
                        <h5>{{ strip_tags($competence->description) }}</h5>
                    </div>
                    <div class="d-flex d-flex-row my-2">
                        <p class="text-bold mr-2">Fecha inicio:</p>
                        <p>{{ $competence->start_date }}</p>
                    </div>
                    <div class="d-flex d-flex-row my-2">
                        <p class="text-bold mr-2">Fecha fin:</p>
                        <p>{{ $competence->end_date }}</p>
                    </div>
                    <div class="d-flex d-flex-row my-2">
                        <p class="text-bold mr-2">Estatus:</p>
                        @switch($competence->status)
                            @case(1)
                                <span class='badge badge-danger h-25'>Borrador</span>
                            @break
                            @case(2)
                                <span class='badge badge-success h-25'>Publicada</span>
                            @break
                            @case(3)
                                <span class='badge badge-warning h-25'>Finalizada</span>
                            @break
                        @endswitch
                    </div>
                    <div class="d-flex d-flex-row my-2">
                        <p class="text-bold mr-2">Competidores inscritos:</p>
                        <p>{{ $competence->students_count }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <h2 class="text-center text-bold">Categorías</h2>
    <div class="row">
        @foreach ($competence->categories as $category)
            <div class="col-sm-12  mb-4">
                <ul class="list-group">
                    <li class="list-group-item bg-dark">{{ $category->name }}</li>
                    @forelse ($competence->subcompetences()->where('category_id', $category->id)->get() as $subcompetence)
                        <a data-toggle="collapse" href="#collapseExample{{ $subcompetence->id }}" role="button"
                            aria-expanded="false" aria-controls="collapseExample" class="text-dark">
                            <div class="list-group-item">
                                <div class="d-flex justify-content-between">
                                    <li class="list-unstyled h5">{{ $subcompetence->name }}</li>
                                    <i class="fa fa-chevron-circle-down"></i>
                                </div>
                            </div>
                        </a>
                        <div class="collapse" id="collapseExample{{ $subcompetence->id }}">
                            <div class="card card-body">
                                <div class="d-flex d-flex-row">
                                    <p class="text-bold mr-2">Descripción:</p>
                                    <p class="text-break">{{ strip_tags($subcompetence->description) }}</p>
                                </div>
                                <div class="d-flex d-flex-row">
                                    <p class="text-bold mr-2">Precio:</p>
                                    <p>${{ $subcompetence->price }}</p>
                                </div>
                                <div>
                                    <p class="text-bold mr-2">Niveles:</p>
                                    @forelse ($subcompetence->levels as $level)
                                        <li class="ml-5">{{ $level->name }}</li>
                                    @empty
                                        <p>No existen niveles en la subcompetencia</p>
                                    @endforelse
                                </div>
                                <div>
                                    <p class="text-bold mr-2">Juces y Criterios:</p>
                                    @forelse ($subcompetence->users()->distinct()->get() as $judge)
                                        <div>{{ $judge->name }}
                                            
                                            @foreach ($judge->criteria()->where('subcompetence_id',$subcompetence->id)->get() as $criterion)
                                                <li class="ml-5"> {{ $criterion->name }}</li>
                                            @endforeach
                                        </div>
                                    @empty
                                        <p>No existen jueces ni criterios en la subcompetencia</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    @empty
                        <li class="list-group-item">
                            No existe ninguna subcompetencia en esta categoria
                        </li>
                    @endforelse
                </ul>
            </div>
        @endforeach
    </div>
</div>
</div>
@stop

@section(' css')
<link rel="stylesheet" href="/css/admin_custom.css">
<style>
    .zoom:hover {
        transform: scale(1.5);
    }

</style>
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
