@extends('mail.layout')
@section('content')
    <h2><strong>¡Hola!</strong></h2>
    <p>Parece que hay un nuevo mensaje de {{$data['name']}} {{$data['surname']}}</p>
    <p><strong>Telefono:</strong> {{$data['phone']}}</p>
    <p><strong>Correo Electronico:</strong> {{$data['email']}}</p>
    <p><strong>Mensaje:</strong> {{$data['message']}}</p>
    <p>Saludos</p>
@endsection