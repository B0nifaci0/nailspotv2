<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        {!! htmlScriptTagJsApi() !!}
    </head>

    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gradient-to-r from-purple-800  to-pink-600">
            @livewire('navigation')
            <div class="relative pt-16 flex content-center items-center justify-center"> 
            </div>
            <div class="container ">
                <div class="block">
                    <button class="mb-4 font-bold text-lg text-white" id="boton">
                       Perfil del Usuario <i class="fas fa-chevron-circle-down"></i>
                    </button>
                </div>
                <div id="menu" class=" mt-2 mb-5  w-48 bg-white rounded-lg py-2 shadow-md hidden">
                    <a href="{{route('profile.show')}}" class="block px-4 py-2 text-gray-800 hover:bg-pink-500 hover:text-white">Informacion del usuario</a>
                    <a href="{{route('profile.courses')}}" class="block px-4 py-2 text-gray-800 hover:bg-pink-500 hover:text-white">Cursos Adquiridos</a>
                    <a href="{{route('profile.competences')}}" class="block px-4 py-2 text-gray-800 hover:bg-pink-500 hover:text-white">Competencias </a>
                    <a href="{{route('profile.security')}}" class="block px-4 py-2 text-gray-800 hover:bg-pink-500 hover:text-white">Seguridad</a>
                    <a href="{{route('profile.delete')}}" class="block px-4 py-2 text-gray-800 hover:bg-pink-500 hover:text-white">Eliminar Cuenta</a>
                </div>
            </div>
            <!--<div class="container py-8 grid grid-cols-5 gap-6">
                <aside>
                    <h1 class="mb-4 font-bold text-lg">Perfil de Usuario</h1>
                    <ul class="text-sm text-white">
                        <li
                            class="leading-7 mb-1 border-l-4 @routeIs ('profile.show') border-pink-600 @else border-transparent @endif pl-2">
                            <a href="{{route('profile.show')}}">Informacion de usuario</a>
                        </li>
                        <li
                            class="leading-7 mb-1 border-l-4 @routeIs ('profile.courses') border-pink-600 @else border-transparent @endif pl-2">
                            <a href="{{route('profile.courses')}}">Cursos Adquiridos</a>
                        </li>
                        <li
                            class="leading-7 mb-1 border-l-4 @routeIs ('profile.competences') border-pink-600 @else border-transparent @endif pl-2">
                            <a href="{{route('profile.competences')}}">Competencias</a>
                        </li>
                        <li
                            class="leading-7 mb-1 border-l-4 @routeIs ('profile.security') border-pink-600 @else border-transparent @endif pl-2">
                            <a href="{{route('profile.security')}}">Seguridad</a>
                        </li>
                        <li
                            class="leading-7 mb-1 border-l-4 @routeIs ('profile.delete') border-pink-600 @else border-transparent @endif pl-2">
                            <a href="{{route('profile.delete')}}">Eliminar cuenta</a>
                        </li>
                    </ul>
                </aside>
            </div>-->
            <div class="col-span-4 container">
                <section class="card ">
                    <main class="card-body  text-gray-500">
                        {{$slot}}
                    </main>
                </section>
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)
        {{$js}}
        @endisset
    </body>

</html>

<script>
const boton = document.querySelector('#boton');
const menu = document.querySelector('#menu');

boton.addEventListener('click', () => {
    console.log('Me diste click')
    menu.classList.toggle('hidden')
})
</script>