<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body style="background: rgb(141,26,212);
background: linear-gradient(90deg, rgba(141,26,212,1) 13%, rgba(188,36,169,1) 47%, rgba(193,19,208,1) 69%);   word-wrap: break-word;">
    <header style="color:white; width: 100%; height: 4rem; color:white; display: flex; justify-content: center; align-items: center;">
        <h1 style="margin:auto">Nailspot</h1>
    </header>
    <section>
        <div style="padding: 1rem;">
            <div style="background-color: rgba(55, 48, 163); border-radius:10px; padding: 30px;">
                <h2 style="font-size: 20px; margin: 10px 0; font-weight: bold; color:white; text-align: center;">Contacto</h2>
                <hr>
                <div style="paddig-lef:10;">
                    <div>
                        <p style="color:white; font-size:15px;">Nombre: {{$contacto['name']}} {{$contacto['surname']}}</p>
                    </div>
                    <div>
                        <p style="color:white; font-size:15px;">Correo: Electronico: <b style="color: white">{{$contacto['email']}}</b></p>
                    </div>
                    <div>
                        <p style="color:white; font-size:15px;">Mensaje:</p>
                        <div style="color:white; font-size:15px;">
                            {{$contacto['message']}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>