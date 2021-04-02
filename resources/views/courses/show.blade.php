<x-app-layout>
     @section('header')
    <!--COmienza prueba--->
    <div class="w-full lg:max lg:flex pt-20 p-2 bg-gray-900 relative"> 
        <div class="w-full sm:w-1/2 md:w-1/3 flex flex-col p-4 ">
            <div class=" flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden bg-center">
                <div class=" mx-auto flex-1 flex flex-col" style="">
                {!!$course->iframe!!}
                </div>
            </div>
        </div>
        <div class="w-full sm:w-1/2 md:w-2/3 flex flex-col  ">
            <section class="card mt-5 mb-5 ml-4 mr-4">
                <div class="p-4 flex-1 flex flex-col" style="">
                    <h1 class="mb-2 text-6xl text-center justify-items-center">{{$course->name}}</h1>
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
                    <span class="text-white">{{$course->rating}}</span>
                    @endif
                    <div class="flex items-center ml-5 mb-6">
                        <img class="w-12 h-12 rounded-full mr-4" src="{{$course->teacher->profile_photo_url}}"
                        alt="Avatar of Writer">
                        <div class="text-sm ">
                        <p class=" leading-none">{{$course->teacher->name}}</p>
                        <p class="">Publicado: {{$course->created_at->format('d-m-Y')}}</p>
                        </div>
                    </div>
                </div>
            </section>  
        </div>
    </div>
    @endsection
    <div class="bg-gray-900">
        <h1 class="text-6xl text-white text-center">Conoce el curso... </h1>
        <div class="grid lg:grid-cols-3 grid grid-cols-1  gap-4">
            <div class="order-2 lg:col-span-2 transform hover:scale-105 ">
                <section class="card mt-5 mb-5 ml-4 mr-4">
                    <div class="card-body roundedxl">
                        <h1 class="text-5xl text-gray-700 font-bold mb-3 text-center">Lo que aprenderas en este curso...</h1>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2 ">
                            @foreach ($course->goals as $goal)
                            <li class="text-gray-700 text-xl"> - {{$goal->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>
            <div class="order-2">
                <section class=" card mt-5 mb-5 ml-4 mr-4 transform hover:scale-105">
                    <div class="card-body">
                        <h1 class="font-bold text-3xl text-center">Requisitos</h1>
                        <ul class="list-disc list-inside">
                            @foreach ($course->requirements as $requirement)
                            <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>
        </div>
        <div class="grid lg:grid-cols-3 grid grid-cols-1 gap-4">
            <div class="order-2">
                <section class="card mb-8 ml-4 mr-4 transform hover:scale-105">
                    <div class="card-body">
                        <h1 href="#" class="text-3xl text-gray-700 font-bold mb-3 text-center">Contenido del curso</h1>
                        <ul>
                            @foreach ($course->lessons as $lesson)
                            <li class="text-gray-700 text-base"> - {{$lesson->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>
            <div class="order-2">
                <section class="card  mb-5 ml-4 mr-4 transform hover:scale-105">
                    <div class="card-body">
                        <h1 class="font-bold text-3xl text-center">Descripción</h1>
                        <div class="text-gray-700 text-base">
                            {{$course->description}}
                        </div>
                    </div>
                </section>
            </div>
            <!---->
            <div class="order-2 lg:col-span-1 ">
                <section class="card mb-5 ml-4 mr-4 transform hover:scale-105">
                    <div class="card-body">
                        <h1 class="mb-4 text-3xl text-center font-bold text-gray-700">Autor</h1>
                        <div class="flex items-center justify-center text-gray-700">
                            <img src="{{$course->teacher->profile_photo_url}}" alt="avatar"
                                class="w-16 h-16 object-cover rounded-full shadow-lg mx-4">
                            <div >
                                <h1 class="font-bold mx-1 hover:underline text-2xl">{{$course->teacher->name}}</h1>
                                <span class="text-xl font-light">Publicado
                                    {{$course->created_at->format('d-m-Y')}}</span>
                            </div>
                        </div>
                        @can('enrolled',$course)
                        <a href="{{route('course.status',$course)}}" type="submit" class="my-button mt-4">Continuar
                            con
                            el
                            curso</a>
                        @else
                        <p class="text-2xl text-center text-gray-500 font-bold mt-3 mb-2"> $ {{$course->price}} MXN</p>
                        <a href="{{route('payment.course.checkout', $course)}}" class="my-button">Comprar este
                            curso</a>
                        @endcan
                    </div>
                </section>
            </div>
        </div>
        <div class="grid lg:grid-cols-3 grid grid-cols-1  gap-4">
            <div class="order-2 lg:col-span-2 ">
                <section class="card mb-12 ml-4 mr-4 transform hover:scale-105">
                    <div class="card-body">
                        @livewire('courses-reviews', ['course' => $course])
                    </div>
                </section >
            </div>
            <div class="order-2">
                <aside class=" card lg:block ml-4 mr-4 transform hover:scale-105">
                    <div class="card-body">
                        <h1 class="mb-4 text-4xl text-center font-bold text-gray-700">Similares </h1>
                        @foreach ($similares as $similar)
                        <article class=" flex mb-6 mt-4 ">
                        <img class="h-32 w-40 object-cover" src="{{Storage::url($similar->image->url)}}">
                        <div class="ml-2">
                        <h1>
                            <a class="font-bold text-gray-500 mb-3"
                                href="{{route('course.show',$similar)}}">{{Str::limit($similar->name,40)}}</a>
                        </h1>
                        <div class="flex items-center mb-2">
                            <img class="h-8 w-8 object-cover rounded-full shadow-lg"
                                src="{{$similar->teacher->profile_photo_url}}" alt="">
                            <p class="text-gray-700 text-sm ml-2">{{$similar->teacher->name}}</p>
                        </div>
                        @if ($similar->rating!=6)
                        <p class="text-sm"><i class="fas fa-star text-yellow-400 mr-2"></i>{{$similar->rating}}
                        </p>
                        @endif
                        </div>
                        </article>
                        @endforeach
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <!---->
</x-app-layout>