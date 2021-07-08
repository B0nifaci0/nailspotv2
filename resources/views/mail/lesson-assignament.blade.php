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
        <p>{{$taskuser->user->name}} acaba de entregar una tarea del curso: {{$taskuser->task->course->name}}</p>

        {{-- <a href="{{routeroute('instructor.courses.student.tasks',[$taskuser->task->course, $taskuser->task->user])}}">Ir
        a calificar</a> --}}
    </body>

</html>