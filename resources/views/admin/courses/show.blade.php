<x-app-layout>
    <div class="grid grid-cols-1 bg-purple-800  lg:grid-cols-3">
        @if (session('info'))
        <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
            <div class="relative px-4 py-3 text-red-700 bg-red-100 border border-red-400 rounded" role="alert">
                <strong class="font-bold">Ocurrio un error!</strong>
                <span class="block sm:inline">{{session('info')}}</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="w-6 h-6 text-red-500 fill-current" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20" x-on:click="open = false">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        </div>
        @endif
    </div>
    <h1 class="pt-5 text-5xl text-center text-white bg-purple-800  text-bold">Aprobar Curso</h1>
    <div class="relative p-2 pt-10 bg-purple-800  md:flex">
        <div class="sm:w-2/2 md:w-1/3 lg:w-2/4 xl:w-2/5">
            <section class="m-4 mt-5 mb-5 bg-indigo-800">
                <div class="flex-none overflow-hidden text-center bg-center bg-cover rounded rounded-t">
                    <div class=" embed-responsive">
                        <figure>
                            @if($course->iframe)

                            {!!$course->iframe!!}
                            @endif
                        </figure>
                    </div>
                </div>
            </section>
        </div>
        <div class="sm:w-2/2 md:w-2/3 lg:w-2/4 xl:w-3/5 ">
            <section class="mt-5 mb-5 ml-4 mr-4 text-white bg-indigo-800">
                <div class="flex flex-col flex-1 p-4" style="">
                    <h1 class="mb-2 text-4xl text-center justify-items-center">{{$course->name}}</h1>
                    <h2 class="mb-3 ml-5 text-xl">{!! $course->description !!}</h2>
                    <div class="flex-1 mb-2 text-lg">
                        <p class="mb-3 ml-5"> Nivel: {{ $course->level->name}}</p>
                        <p class="mb-3 ml-5">Categoria: {{ $course->category->name}}</p>
                        <p class="mb-3 ml-5">Matriculados: <i class="fas fa-users"></i>
                            {{($course->students_count)}}</p>
                        @if ($course->rating!==6)
                        <ul class="flex ml-5 text-sm">
                            <li class="mr-1"><i
                                    class="fas fa-star text-{{$course->rating>= 1 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                            <li class="mr-1"><i
                                    class="fas fa-star text-{{$course->rating>= 2 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                            <li class="mr-1"><i
                                    class="fas fa-star text-{{$course->rating>= 3 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                            <li class="mr-1"><i
                                    class="fas fa-star text-{{$course->rating>= 4 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                            <li class="mr-1"><i
                                    class="fas fa-star text-{{$course->rating>= 5 ? 'yellow' : 'gray'}}-400"></i>
                            </li>
                        </ul>
                        <p class="mb-3 ml-5 ">Calificación: {{$course->rating}}</p>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!--Aqui termina la primera parte --->
    <div class="bg-purple-800">
        <h2 class="py-4 text-5xl text-center text-white">Información del curso</h2>
    </div>
    <!---Espacio para las lecciones-->
    <div class="bg-purple-800">
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
            <div class="order-2 lg:col-span-4 md:col-span-1 xl:col-span-3">
                <section class="mt-5 mb-5 ml-4 mr-4 text-white bg-indigo-800">
                    <div class="card-body rounded-xl ">
                        <h1 class="text-3xl font-bold text-center">Lecciones</h1>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2">
                            @forelse ($course->lessons as $lesson)
                            <li class="text-base  embed-responsive rounded-xl"> - {!!$lesson->iframe!!}</li>
                            @empty
                            <h1>No hay lecciones registradas</h1>
                            @endforelse
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!--Se termina el espacio para las lecciones-->
    <div class="bg-purple-800 ">
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
            <div class="order-2 ">
                <section class="mt-5 mb-5 ml-4 mr-4 text-white bg-indigo-800 ">
                    <div class="card-body rounded-xl">
                        <h1 class="mb-3 text-2xl font-bold">Lo que aprenderas
                            en este curso...</h1>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2 ">
                            @forelse ($course->goals as $goal)
                            <li class="text-base "> - {{$goal->name}}</li>
                            @empty
                            <h1>No existen metas registradas</h1>
                            @endforelse
                        </ul>
                    </div>
                </section>
            </div>
            <div class="order-2">
                <section class="mt-5 mb-5 ml-4 mr-4 text-white bg-indigo-800 ">
                    <div class="card-body">
                        <h1 class="text-3xl font-bold text-center">Requisitos</h1>
                        <ul class="list-disc list-inside">
                            @forelse ($course->requirements as $requirement)
                            <li class="text-base ">{{$requirement->description}}</li>
                            @empty
                            <li>No hay requerimentos registrados</li>
                            @endforelse
                        </ul>
                    </div>
                </section>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
            <div class="order-2 lg:col-span-1 ">
                <section class="mt-5 mb-5 ml-4 mr-4 text-white bg-indigo-800">
                    <div class="card-body">
                        <h1 class="text-3xl font-bold text-center">Descripción</h1>
                        <div class="text-base ">
                            {!! $course->description !!}
                        </div>
                </section>
            </div>
            <div class="order-2">
                <section class="mt-5 mb-5 ml-4 mr-4 text-white bg-indigo-800 ">
                    <div class="card-body">
                        <h1 class="mb-4 text-xl font-bold t">Autor</h1>
                        <div class="flex items-center ">
                            <img src="{{$course->teacher->profile_photo_url}}" alt="avatar"
                                class="object-cover w-12 h-12 mx-4 rounded-full shadow-lg">
                            <div>
                                <h1 class="mx-1 font-bold hover:underline">{{$course->teacher->name}}</h1>
                                <span class="text-sm font-light">Publicado
                                    {{$course->created_at->format('d-m-Y')}}</span>
                            </div>
                        </div>
                        <form action="{{route('admin.courses.approved',$course)}}" method="post">
                            @csrf
                            <button type="submit"
                                class="block w-full px-4 py-2 mt-4 font-bold text-center text-white bg-pink-500 hover:bg-pink-600 rounded-xl ">Aprobar</button>
                        </form>
                        <div class="mt-5 mb-5 ">
                        </div>
                        <div class="flex items-center overflow-hidden text-gray-700">

                            {!! Form::open(['method' => 'POST', 'route' => 'admin.courses.disapproved', 'class' =>
                            'form-horizontal'])
                            !!}
                            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                {!! Form::label('Escribir un comentario', '', ['class' => 'text-white']) !!}<br>
                                {!! Form::textarea('body', null, ['class' => 'form-control w-full', 'required' =>
                                'required'])
                                !!}
                                <small class="text-danger">{{ $errors->first('body') }}</small>
                            </div>
                            {!! Form::hidden('course', $course->id) !!}
                            <div class="btn-group pull-left">
                                {!! Form::submit('Devolver curso y enviar comentario', ['class' => 'cursor-pointer
                                w-full bg-pink-500 hover:bg-pink-600 text-white font-bold py-2 px-4 block text-center
                                w-full mt-4 rounded-xl']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                </section>
            </div>

        </div>
    </div>

</x-app-layout>