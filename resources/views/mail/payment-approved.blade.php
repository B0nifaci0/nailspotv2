<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <h1>Pago exitoso.</h1>
        <h2>ya puedes ingresar al curso adquirido</h2>
        <a href="{{route('course.status',$course)}}">
            {{$course->name}}</a>
    </body>

</html>