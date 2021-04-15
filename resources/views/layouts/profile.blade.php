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
    </head>

    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-purple-500">
            @livewire('navigation')
            <div class="relative pt-16 flex content-center items-center justify-center">
            </div>
            <div class="container py-8 grid grid-cols-5 gap-6">
                <aside>
                    <h1 class="mb-4 text-gray-800 font-bold text-lg">Perfil de Usuario</h1>
                    <ul class="text-md text-gray-200">
                        <li
                            class="leading-7 mb-1 border-l-4 @routeIs ('profile.show') border-pink-500 @else border-transparent @endif pl-2">
                            <a href="{{route('profile.show')}}">Informacion de usuario</a>
                        </li>
                        <li
                            class="leading-7 mb-1 border-l-4 @routeIs ('profile.courses') border-pink-500 @else border-transparent @endif pl-2">
                            <a href="{{route('profile.courses')}}">Cursos Adquiridos</a>
                        </li>
                        <li
                            class="leading-7 mb-1 border-l-4 @routeIs ('profile.competences') border-pink-500 @else border-transparent @endif pl-2">
                            <a href="{{route('profile.competences')}}">Competencias</a>
                        </li>
                        <li
                            class="leading-7 mb-1 border-l-4 @routeIs ('profile.security') border-pink-500 @else border-transparent @endif pl-2">
                            <a href="{{route('profile.security')}}">Seguridad</a>
                        </li>
                        <li
                            class="leading-7 mb-1 border-l-4 @routeIs ('profile.delete') border-pink-500 @else border-transparent @endif pl-2">
                            <a href="{{route('profile.delete')}}">Eliminar cuenta</a>
                        </li>
                    </ul>

                </aside>
                <div class="col-span-4 card">
                    <main class="card-body  text-gray-500">
                        {{$slot}}
                    </main>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts

        @isset($js)
        {{$js}}
        @endisset
    </body>

</html>