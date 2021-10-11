@extends('mail.layout')
@section('content')
        <h2>¡Felicidades!</h2>
        <p>Aprobaste el curso, ya puedes descargar tu certificado</p>
        <a href="{{route('profile.courses.tasks', $course)}}" style="text-decoration:none; color:white; width:80px; padding:.8rem; background-color:#d53f8c; border-radius:5px; text-align:center; word-wrap: break-word;">Abrir<a/>
@endsection