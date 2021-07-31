@extends('mail.layout')
@section('content')
    <h2><strong>¡Opps!</strong></h2>
    <p>El curso {{$course->name}} no ha sido aprovado, por favor verifica los comentarios de retroalimentación.</p>
    <a href="{{route('instructor.courses.edit',$course)}}" style="text-decoration:none; color:white; width:40px; padding:.8rem; background-color:#d53f8c; border-radius:5px; text-align:center; word-wrap: break-word;" >Ver</a>
@endsection 