@extends('mail.layout')
@section('content')
    <h2><strong>¡Hola!</strong></h2>
    <p>El alumno {{$user->name}} entregó la tarea {{$task->title}}</p>
    <a href="{{route('instructor.task.show',[$task,$user])}}" style="text-decoration:none; color:white; width:80px; padding:.8rem; background-color:#d53f8c; border-radius:5px; text-align:center; word-wrap: break-word;" >Calificar</a>
@endsection