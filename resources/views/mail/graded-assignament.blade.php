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
        <a href="{{route('profile.task',$taskuser->task)}}">Revisar.</a>
    </body>

</html>