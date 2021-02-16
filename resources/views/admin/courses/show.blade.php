<x-app-layout>

    <section class="bg-gray-700 py-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                @if ($course->image)
                <img class="h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
                @endif
            </figure>
            <div class="text-white">
                <h1 class="text-4xl">{{$course->name}}</h1>
                <h2 class="text-xl mb-3">{!! $course->description !!}
                    <p class="mb-2">Nivel: {{$course->level->name}}</p>
                    <p class="mb-2">Categoria: {{$course->category->name}}</p>
                    <p class="mb-2">Matriculados: {{$course->students_count}}</p>
                    <p class="mb-2">Calificación: {{$course->rating}}</p>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
        @if (session('info'))
        <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Ocurrio un error!</strong>
                <span class="block sm:inline">{{session('info')}}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" x-on:click="open = false">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        </div>
        @endif
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="text-2xl text-gray-700 font-bold mb-3">Lo que aprenderas
                        en este curso...</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2 ">
                        @forelse ($course->goals as $goal)
                        <li class="text-gray-700 text-base"> - {{$goal->name}}</li>
                        @empty
                        <h1>No existen metas registradas</h1>
                        @endforelse
                    </ul>
                </div>
            </section>

            <section class="card mb-12">
                <div class="card-body">
                    <h1 href="#" class="text-2xl text-gray-700 font-bold mb-3">Lecciones</h1>
                    <ul>
                        @forelse ($course->lessons as $lesson)
                        <li class="text-gray-700 text-base"> - {{$lesson->name}}</li>
                        @empty
                        <h1>No hay lecciones registradas</h1>
                        @endforelse
                    </ul>
                </div>
            </section>


            <section class="mb-12">
                <h1 class="font-bold text-3xl">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @forelse ($course->requirements as $requirement)
                    <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                    @empty
                    <li>No hay requerimentos registrados</li>
                    @endforelse
                </ul>
            </section>

            <section class="mb-8">
                <h1 class="font-bold text-3xl">Descripcion</h1>
                <div class="text-gray-700 text-base">
                    {!! $course->description !!}
                </div>
            </section>
        </div>

        <div class="order-1 lg:order-2">
            <section class="card">
                <div class="card-body">
                    <h1 class="mb-4 text-xl font-bold text-gray-700">Autor</h1>
                    <div class="flex items-center text-gray-700">
                        <img src="{{$course->teacher->profile_photo_url}}" alt="avatar"
                            class="w-12 h-12 object-cover rounded-full shadow-lg mx-4">
                        <div>
                            <h1 class="font-bold mx-1 hover:underline">{{$course->teacher->name}}</h1>
                            <span class="text-sm font-light">Publicado
                                {{$course->created_at->format('d-m-Y')}}</span>
                        </div>
                    </div>
                    <form action="{{route('admin.courses.approved',$course)}}" method="post">
                        @csrf
                        <button type="submit" class="my-button">Aprobar</button>
                    </form>
                </div>
            </section>

        </div>
    </div>

</x-app-layout>