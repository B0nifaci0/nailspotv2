@extends('mail.layout')
@section('content')
    <h2><strong>¡Hola!</strong></h2>
    <p>Que tal {{$data['name']}} {{$data['surname']}} pronto nos pondremos en contacto con usted.</p>
    <p>Saludos, Nailspot</p>
@endsection