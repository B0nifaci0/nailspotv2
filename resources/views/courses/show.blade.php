<x-app-layout> 
     @section('header')
    <!--COmienza prueba--->
    <div class="relative p-2 pt-10 bg-purple-800 md:flex"> 
        <div class="sm:w-2/2 md:w-1/3 lg:w-2/4 xl:w-2/5 ">
            <section class="m-4 mt-5 mb-5 card">
                <div class="flex-none overflow-hidden text-center bg-center bg-cover rounded rounded-t">
                    <div class=" embed-responsive">
                    {!!$course->iframe!!}
                    </div>
                </div>
            </section>
        </div>
        <div class="sm:w-2/2 md:w-2/3 lg:w-2/4 xl:w-3/5 ">
            <section class="mt-5 mb-5 ml-4 mr-4 bg-indigo-800">
                <div class="flex flex-col flex-1 p-4" style="">
                    <h1 class="mb-2 text-5xl text-center justify-items-center text-white">{{$course->name}}</h1>
                    <h2 class="mb-3 ml-5 text-xl text-white">{!! $course->description !!}</h2>
                    <div class="flex-1 mb-2 text-sm text-white">
                       <p class="mb-3 ml-5"> Nivel: {{ $course->level->name}}</p>
                       <p class="mb-3 ml-5">Categoria: {{ $course->category->name}}</p>
                       <p class="mb-3 ml-5">Matriculados: <i class="fas fa-users"></i>
                            {{($course->students_count)}}</p>
                    @if ($course->rating!==6)
                    <ul class="flex ml-5 text-sm">
                    <span class="ml-2 mr-3 text-white"> {{$course->rating}}</span>
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
                    @endif
                    <!--<div class="flex items-center mb-6 ml-5">
                        <img class="w-12 h-12 mr-4 rounded-full" src="{{$course->teacher->profile_photo_url}}"
                        alt="Avatar of Writer">
                        <div class="text-sm ">
                        <p class="leading-none ">{{$course->teacher->name}}</p>
                        <p class="">Publicado: {{$course->created_at->format('d-m-Y')}}</p>
                        </div>
                    </div>-->
                </div>
            </section>  
        </div>
    </div>
    @endsection
    <div class="bg-purple-800">
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
            <div class="order-2 lg:col-span-2 ">
                <section class="mt-5 mb-5 ml-4 mr-4 bg-indigo-800">
                    <div class="card-body roundedxl">
                        <h1 class="mb-3 text-3xl font-bold text-center text-white">Lo que aprenderas en este curso...</h1>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2 ">
                            @foreach ($course->goals as $goal)
                            <li class="text-xl text-white"> - {{$goal->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>
            <div class="order-2">
                <section class="mt-5 mb-8 ml-4 mr-4 bg-indigo-800">
                    <div class="card-body">
                        <h1 href="#" class="mb-3 text-3xl font-bold text-center text-white">Contenido del curso</h1>
                        <ul>
                            @foreach ($course->lessons as $lesson)
                            <li class="text-base text-white"> - {{$lesson->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>
            <div class="order-2">
                <section class="mt-5 mb-5 ml-4 mr-4  bg-indigo-800">
                    <div class="card-body">
                        <h1 class="text-3xl text-white font-bold text-center">Requisitos</h1>
                        <ul class="list-disc list-inside">
                            @foreach ($course->requirements as $requirement)
                            <li class="text-base text-white">{{$requirement->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </section>
            </div>
            <div class="order-2">
                <section class="mt-5 mb-5 ml-4 mr-4 bg-indigo-800">
                    <div class="card-body">
                        <h1 class="text-3xl text-white font-bold text-center">Descripción</h1>
                        <div class="text-base text-white">
                            {!! $course->description !!}
                        </div>
                    </div>
                </section>
            </div>
            <div class="order-2 lg:col-span-1 ">
                <section class="mt-5 mb-5 ml-4 mr-4 bg-indigo-800 ">
                    <div class="card-body">
                        <h1 class="mb-4 text-3xl font-bold text-center text-white">Autor</h1>
                        <div class="flex items-center justify-center text-white">
                            <img src="{{$course->teacher->profile_photo_url}}" alt="avatar"
                                class="object-cover w-16 h-16 mx-4 rounded-full shadow-lg">
                            <div >
                                <h1 class="mx-1 text-2xl font-bold hover:underline">{{$course->teacher->name}}</h1>
                                <span class="text-xl font-light">Publicado
                                    {{$course->created_at->format('d-m-Y')}}</span>
                            </div>
                        </div>
                        @can('enrolled',$course)
                        <a href="{{route('course.status',$course)}}" type="submit" class="block w-full px-4 py-2 mt-4 font-bold text-center text-white bg-pink-500 hover:bg-pink-600 rounded-xl">Continuar
                            con
                            el
                            curso</a>
                        @else
                        <p class="mt-3 mb-2 text-2xl font-bold text-center text-white"> $ {{$course->price}} MXN</p>
                        <a href="{{route('payment.course.checkout', $course)}}" class="block w-full px-4 py-2 mt-4 font-bold text-center text-white bg-pink-500 hover:bg-pink-600 rounded-xl">Comprar este
                            curso</a>
                        @endcan
                    </div>
                </section>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-4">
            <!---->
        <!--</div>
        <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">-->
            <div class="order-2 lg:col-span-2 ">
                <section class="mb-12 ml-4 mr-4 bg-indigo-800 ">
                    <div class="card-body">
                        @livewire('courses-reviews', ['course' => $course])
                    </div>
                </section >
            </div>
            <div class="order-2 lg:col-span-2">
                <aside class="ml-4 mr-4  bg-indigo-800 lg:block">
                    <div class="card-body">
                        <h1 class="mb-4 text-4xl font-bold text-center text-white">Similares </h1>
                        @foreach ($similares as $similar)
                        <article class="flex mt-4 mb-6 ">
                        <img class="object-cover w-40 h-32" src="{{Storage::url($similar->image->url)}}">
                        <div class="ml-2">
                        <h1>
                            <a class="mb-3 font-bold text-white"
                                href="{{route('course.show',$similar)}}">{{Str::limit($similar->name,40)}}</a>
                        </h1>
                        <div class="flex items-center mb-2">
                            <img class="object-cover w-8 h-8 rounded-full shadow-lg"
                                src="{{$similar->teacher->profile_photo_url}}" alt="">
                            <p class="ml-2 text-sm text-white">{{$similar->teacher->name}}</p>
                        </div>
                        @if ($similar->rating!=6)
                        <p class="text-sm"><i class="mr-2 text-yellow-400 fas fa-star"></i>{{$similar->rating}}
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