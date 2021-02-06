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

    <style>
        @media only screen {
            .video-title {
                background-color: rgba(32, 2, 2, 0);
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translateX(-70%);
                z-index: 2;
            }
        }
    </style>

    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <div class="container py-8 grid grid-cols-5">
                <aside>
                    <h1 class="mb-4 font-bold text-lg">Edicion del curso</h1>
                    <ul class="text-sm text-gray-600">
                        <li
                            class="leading-7 mb-1 border-l-4 @routeIs ('instructor.courses.edit', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.edit', $course)}}">Informacion del curso</a>
                        </li>
                        <li
                            class="leading-7 mb-1 border-l-4 @routeIs ('instructor.courses.curriculum', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.curriculum', $course)}}">Lecciones del curso</a>
                        </li>
                        <li
                            class="leading-7 mb-1 border-l-4 @routeIs ('instructor.courses.goals', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.goals', $course)}}">Metas del curso</a>
                        </li>
                        <li
                            class="leading-7 mb-1 border-l-4 @routeIs ('instructor.courses.students', $course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.students', $course)}}">Estudiantes</a>
                        </li>
                    </ul>
                </aside>
                <div class="col-span-4 card">
                    <main class="card-body text-gray-500">
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