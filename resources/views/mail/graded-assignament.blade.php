<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <h1>Tú tarea ha sido calificada.</h1>
        <a href="{{route('course.status',[$lesson->course])}}">Ir al curso.</a>
    </body>

</html>