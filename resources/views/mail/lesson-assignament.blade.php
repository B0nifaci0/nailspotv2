<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>

    <body>
        <h1>Tarea recibida</h1>
        <p>{{$student->name}} acaba de entregar una tarea de la lección: {{$lesson->name}}</p>

        <a href="{{route('instructor.courses.tasks',[$lesson->course, $student])}}">Ir a calificar</a>
    </body>

</html>