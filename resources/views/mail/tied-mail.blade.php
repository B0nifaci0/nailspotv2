@extends('mail.layout')
@section('content')
    <h2><strong>¡Opps!</strong></h2>
    <p>Se registro un empate en la subcompetencia {{$subcompetence->name}} entre los usuarios:</p>
    <ul>
        @foreach ($winners as $winner)    
        <li>{{$winner->subcompetenceUser->participant_code}}</li>
        @endforeach
    </ul>
    <p>Saludos</p>
@endsection