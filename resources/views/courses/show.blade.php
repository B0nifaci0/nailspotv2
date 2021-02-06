<x-app-layout>
    <section class="bg-gray-700 py-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-60 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">
            </figure>
            <div class="text-white">
                <h1 class="text-4xl">{{$course->name}}</h1>
                <h2 class="text-xl mb-3">{{$course->description}}</h2>
                <p class="mb-2">Nivel: {{$course->level->name}}</p>
                <p class="mb-2">Categoria: {{$course->category->name}}</p>
                <p class="mb-2">Matriculados: {{$course->students_count}}</p>
                <p class="mb-2">Calificación: {{$course->rating}}</p>
            </div>
        </div>
    </section>

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6">
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card mb-12">
                <div class="card-body">
                    <h1 class="text-2xl text-gray-700 font-bold mb-3">Lo que aprenderas
                        en este curso...</h1>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-2 ">
                        @foreach ($course->goals as $goal)
                        <li class="text-gray-700 text-base"> - {{$goal->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </section>

            <section class="card mb-12">
                <div class="card-body">
                    <h1 href="#" class="text-2xl text-gray-700 font-bold mb-3">Lecciones</h1>
                    <ul>
                        @foreach ($course->lessons as $lesson)
                        <li class="text-gray-700 text-base"> - {{$lesson->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </section>


            <section class="mb-12">
                <h1 class="font-bold text-3xl">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                    <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                    @endforeach
                </ul>
            </section>

            <section class="mb-8">
                <h1 class="font-bold text-3xl">Descripcion</h1>
                <div class="text-gray-700 text-base">
                    {{$course->description}}
                </div>
            </section>

            @livewire('courses-reviews', ['course' => $course])
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
                    @can('enrolled',$course)
                    <a href="{{route('course.status',$course)}}" type="submit" class="my-button mt-4">Continuar con el
                        curso</a>
                    @else
                    <form method="POST" action="{{route('course.enrolled',$course)}}">
                        @csrf
                        <p class="text-2xl text-gray-500 font-bold mt-3 mb-2"> MXN$ {{$course->price}}</p>
                        <a href="{{route('payment.checkout', $course)}}" class="my-button">Comprar este curso</a>
                    </form>
                    @endcan
                </div>
            </section>

            <aside class="hidden lg:block">
                @foreach ($similares as $similar)
                <article class="flex mb-6 mt-4">
                    <img class="h-32 w-40 object-cover" src="{{Storage::url($similar->image->url)}}">
                    <div class="ml-3">
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
                        <p class="text-sm"><i class="fas fa-star text-yellow-400 mr-2"></i>{{$similar->rating}}</p>
                        @endif
                    </div>
                </article>
                @endforeach
            </aside>
        </div>
    </div>

</x-app-layout>