@extends('mail.layout')
@section('content')
    <h2><strong>¡Hola!</strong></h2>
    <p>El instructor {{$user->name}} solicito aprobación del curso {{$course->name}}</p>
    <p>{{$course->updated_at->format('d/m/Y')}}</p>
    <a href="{{route('admin.courses.show',$course)}}" style="text-decoration:none; color:white; width:40px; padding:.8rem; background-color:#d53f8c; border-radius:5px; text-align:center; word-wrap: break-word;" >Ver</a>
@endsection 