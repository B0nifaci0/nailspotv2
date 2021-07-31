@extends('mail.layout')
@section('content')
    <h2><strong>¡Hola!</strong></h2>
    <p>La tarea {{$taskuser->task->title}} ha sido calificada.</p>
    <a href="{{route('profile.task',$taskuser->task)}}" style="text-decoration:none; color:white; width:40px; padding:.8rem; background-color:#d53f8c; border-radius:5px; text-align:center; word-wrap: break-word;" >Abrir</a>
@endsection 