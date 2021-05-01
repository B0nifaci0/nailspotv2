@extends('adminlte::page')

@section('title', 'Asignar Rol')

@section('content_header')
<h1 class="text-bold text-center ">Asignar Rol</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="form-group">
            {!! Form::label('inputname', 'Nombre') !!}
            <p class="font-italic">{{$user->name}}</p>
        </div>
        {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT', 'class' =>
        'form-horizontal']) !!}
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                @foreach ($roles as $role)
                <div class="checkbox{{ $errors->has('roles') ? ' has-error' : '' }}">
                    <label for="roles[]">
                        {!! Form::checkbox('roles[]', $role->id, null) !!} {{$role->name}}
                    </label>
                </div>
                @endforeach
                <small class="text-danger">{{ $errors->first('roles') }}</small>
            </div>
        </div>
        <div class="btn-group pull-right">
            {!! Form::reset("Limpiar", ['class' => 'btn btn-warning']) !!}
            {!! Form::submit("Aceptar", ['class' => 'btn btn-success ml-2']) !!}
        </div>
        {!! Form::close() !!}
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