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

        <div class=" bg-gradient-to-r from-purple-800  to-pink-600 ">
            @livewire('navigation')
            <div class="relative pt-16 flex content-center items-center justify-center"> 
            </div>
            <div class="container ">
                <aside>
                    <a href="{{ route('instructor.courses.index')}}"
                        class="py-2 px-3 w-full flex items-center focus:outline-none">
                        <span
                            class="text-white ml-2 text-lg font-large hover:bg-pink-400 hover:text-white px-3 py-3 rounded-md">
                            Todos mis cursos
                        </span>
                    </a>
            <!---Menu desplegable--->
                    <div class="container">
                        <div class="block">
                            <button class="mb-2 font-bold text-md text-white" id="boton">
                                Edición del curso <i class="fas fa-chevron-circle-down"></i>
                            </button>
                        </div>
                        <div id="menu" class="mt-1 mb-2  w-48 bg-white rounded-lg py-2 shadow-md hidden">
                            <a href="{{route('instructor.courses.edit', $course)}}" class="block px-4 py-2 text-gray-800 hover:bg-pink-500 hover:text-white">Informacion del Curso</a>
                            <a href="{{route('instructor.courses.curriculum', $course)}}" class="block px-4 py-2 text-gray-800 hover:bg-pink-500 hover:text-white">Lecciones del curso</a>
                            <a href="{{route('instructor.courses.goals', $course)}}" class="block px-4 py-2 text-gray-800 hover:bg-pink-500 hover:text-white">Metas del curso</a>
                            <a href="{{route('instructor.courses.students', $course)}}" class="block px-4 py-2 text-gray-800 hover:bg-pink-500 hover:text-white">Estudiantes</a>
                            <a href="{{route('instructor.courses.comments', $course)}}" class="block px-4 py-2 text-gray-800 hover:bg-pink-500 hover:text-white">Comentarios Admin</a>
                            <a href="{{route('instructor.courses.tasks', $course)}}" class="block px-4 py-2 text-gray-800 hover:bg-pink-500 hover:text-white">Tareas</a>
        
                        </div>      
                    </div>
                    @switch($course->status)
                        @case(1)
                        <form class="pt-5 pb-5" action="{{route('instructor.courses.status',$course)}}" method="post">
                            @csrf
                            <div class="container ">
                            <button
                                class="rounded bg-pink-600 text-white ">
                                Solicitar aprobación <i class="far fa-thumbs-up"></i></button>
                            </div>
                        </form>
                        @break
                        @case(2)
                        <div class="container text-gray-500">
                            <div class="bg-yellow-500 text-white text-lg text-center rounded ">
                                En revisión <i class="fas fa-search"></i>
                            </div>
                        </div>
                        @break
                        @case(3)
                        <div class="container text-gray-500 ">
                            <div class=" bg-green-500 text-white text-lg  text-center rounded">
                                Publicado <i class="far fa-check-circle"></i>
                            </div>
                        </div>
                        @break
                        @default

                    @endswitch
                </aside>
            </div>
            <!--Menu desplegable--->
            <div class="col-span-4 container mt-5">
                <section class="card ">
                    <main class="card-body text-gray-500">
                        {{$slot}}
                    </main>
                </section>
            </div>
            <div class="relative pt-16 flex content-center items-center justify-center"> 
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