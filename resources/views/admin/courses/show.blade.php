<x-app-layout>

    <div class="w-full lg:max lg:flex pt-20 p-2 bg-gray-900 relative">
        <div class="w-full sm:w-1/2 md:w-1/3 flex flex-col p-4">
            <section>
                <div class="flex-none bg-cover rounded-t  lg:rounded-t-none lg:rounded-l text-center overflow-hidden bg-center">
                    <div class=" mx-auto flex-1 flex flex-col">
                        <figure>
                            @if($course->image)
                                <img class="h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
                            @endif         
                        </figure>
                    </div>
                </div>
            </section>
        </div>
        <div class="w-full sm:w-1/2 md:w-2/3 flex flex-col ">
            <section class="card mt-5 mb-5 ml-4 mr-4">
                <div class="p-4 flex-1 flex flex-col" style="">
                    <h1 class="mb-2 text-4xl text-center justify-items-center">{{$course->name}}</h1>
                    <h2 class="ml-5 text-xl mb-3">{{$course->description}}</h2>
                    <div class="mb-2 text-grey-darker text-sm flex-1">
                        <p class="ml-5 mb-3"> Nivel: {{ $course->level->name}}</p>
                           <p class="ml-5 mb-3">Categoria: {{ $course->category->name}}</p>
                           <p class="ml-5 mb-3">Matriculados: <i class="fas fa-users"></i>
                                {{($course->students_count)}}</p>
                        @if ($course->rating!==6)
                        <ul class="flex text-sm ml-5">
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
                        <p class="ml-5 mb-3 ">Calificación: {{$course->rating}}</p>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6 ">
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
    </div>
    <!--Aqui termina la primera parte --->
    <div class="bg-gray-900">
        <h2 class="text-center text-5xl text-white py-4">Información del curso</h2>
    </div>
    <div class="bg-gray-900 ">
        <div class="grid lg:grid-cols-3 grid grid-cols-1  gap-4">
            <div class="order-2 lg:col-span-1 transform hover:scale-105 ">
                <section class="card mt-5 mb-5 ml-4 mr-4">
                    <div class="card-body">
                        <h1 class="font-bold text-3xl text-center">Descripción</h1>
                        <div class="text-gray-700 text-base">
                        {!! $course->description !!}
                    </div>
                </section>
            </div>
            <div class="order-2">
                <section class=" card mt-5 mb-5 ml-4 mr-4 transform hover:scale-105">
                    <div class="card-body">
                        <h1 class="font-bold text-3xl text-center">Requisitos</h1>
                        <ul class="list-disc list-inside">
                            @forelse ($course->requirements as $requirement)
                                <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                            @empty
                            <li>No hay requerimentos registrados</li>
                            @endforelse
                        </ul>
                    </div>
                </section>
            </div>
            <div class="order-2">
            <section class="card mt-5 mb-5 ml-4 mr-4 transform hover:scale-105">
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
                        <button type="submit" class="my-button rounded-xl ">Aprobar</button>
                    </form>
                </div>
            </section>
            </div>
        </div>
        <div class="grid lg:grid-cols-3 grid grid-cols-1 gap-4">
            <div class="order-2 lg:col-span-2 transform hover:scale-105">
                <section class="card  mb-5 ml-4 mr-4 transform hover:scale-105">
                    <div class="card-body rounded-xl">
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
            </div>
            <div class="order-2">
                <section class="card mb-8 ml-4 mr-4 transform hover:scale-105">
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
            </div>
            <!---->
        </div>
    </div>

</x-app-layout>