@extends('mail.layout')
@section('content')
    <h2><strong>¡Felicidades!</strong></h2>
    <p>El curso {{$course->name}} fue aprobado.</p>
    <p>{{$course->updated_at->format('d/m/Y')}}</p>
    <a href="{{route('course.show',$course)}}" style="text-decoration:none; color:white; width:40px; padding:.8rem; background-color:#d53f8c; border-radius:5px; text-align:center; word-wrap: break-word;" >Ver</a>
@endsection 