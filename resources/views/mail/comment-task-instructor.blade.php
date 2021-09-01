@extends('mail.layout')
@section('content')
    <h2><strong>¡Hola!</strong></h2>
    <p>Hay un nuevo comentario en la tarea {{$taskUser->task->title}} del cruso {{$taskUser->task->course->name}}.</p>
    <a href="{{route('instructor.task.show',[$taskUser->task,$taskUser->user->id])}}" style="text-decoration:none; color:white; width:40px; padding:.8rem; background-color:#d53f8c; border-radius:5px; text-align:center; word-wrap: break-word;" >Abrir</a>
@endsection