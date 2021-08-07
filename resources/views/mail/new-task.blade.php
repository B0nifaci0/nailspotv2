@extends('mail.layout')
@section('content')
    <h2><strong>Hola!</strong></h2>
    <p>El instructor {{$course->teacher->name}} creo la tarea {{$course->tasks->last()->title}} en el curso {{$course->name}}</p>
    <a href="{{route('profile.task',$course->tasks->last())}}" style="text-decoration:none; color:white; width:40px; padding:.8rem; background-color:#d53f8c; border-radius:5px; text-align:center; word-wrap: break-word;" >Abrir</a>
@endsection 