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

    <!-- component -->
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
                        <button type="submit" class="my-button mt-4">Lo quiero</button>
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
    <footer class="px-6 py-2 bg-gray-800 text-gray-100">
        <div class="flex flex-col justify-between items-center container mx-auto md:flex-row"><a href="#"
                class="text-2xl font-bold">Brand</a>
            <p class="mt-2 md:mt-0">All rights reserved 2020.</p>
            <div class="flex -mx-2 mt-4 mb-2 md:mt-0 md:mb-0"><a href="#"
                    class="mx-2 text-gray-100 hover:text-gray-400"><svg viewBox="0 0 512 512"
                        class="h-4 w-4 fill-current">
                        <path
                            d="M444.17,32H70.28C49.85,32,32,46.7,32,66.89V441.61C32,461.91,49.85,480,70.28,480H444.06C464.6,480,480,461.79,480,441.61V66.89C480.12,46.7,464.6,32,444.17,32ZM170.87,405.43H106.69V205.88h64.18ZM141,175.54h-.46c-20.54,0-33.84-15.29-33.84-34.43,0-19.49,13.65-34.42,34.65-34.42s33.85,14.82,34.31,34.42C175.65,160.25,162.35,175.54,141,175.54ZM405.43,405.43H341.25V296.32c0-26.14-9.34-44-32.56-44-17.74,0-28.24,12-32.91,23.69-1.75,4.2-2.22,9.92-2.22,15.76V405.43H209.38V205.88h64.18v27.77c9.34-13.3,23.93-32.44,57.88-32.44,42.13,0,74,27.77,74,87.64Z">
                        </path>
                    </svg></a><a href="#" class="mx-2 text-gray-100 hover:text-gray-400"><svg viewBox="0 0 512 512"
                        class="h-4 w-4 fill-current">
                        <path
                            d="M455.27,32H56.73A24.74,24.74,0,0,0,32,56.73V455.27A24.74,24.74,0,0,0,56.73,480H256V304H202.45V240H256V189c0-57.86,40.13-89.36,91.82-89.36,24.73,0,51.33,1.86,57.51,2.68v60.43H364.15c-28.12,0-33.48,13.3-33.48,32.9V240h67l-8.75,64H330.67V480h124.6A24.74,24.74,0,0,0,480,455.27V56.73A24.74,24.74,0,0,0,455.27,32Z">
                        </path>
                    </svg></a><a href="#" class="mx-2 text-gray-100 hover:text-gray-400"><svg viewBox="0 0 512 512"
                        class="h-4 w-4 fill-current">
                        <path
                            d="M496,109.5a201.8,201.8,0,0,1-56.55,15.3,97.51,97.51,0,0,0,43.33-53.6,197.74,197.74,0,0,1-62.56,23.5A99.14,99.14,0,0,0,348.31,64c-54.42,0-98.46,43.4-98.46,96.9a93.21,93.21,0,0,0,2.54,22.1,280.7,280.7,0,0,1-203-101.3A95.69,95.69,0,0,0,36,130.4C36,164,53.53,193.7,80,211.1A97.5,97.5,0,0,1,35.22,199v1.2c0,47,34,86.1,79,95a100.76,100.76,0,0,1-25.94,3.4,94.38,94.38,0,0,1-18.51-1.8c12.51,38.5,48.92,66.5,92.05,67.3A199.59,199.59,0,0,1,39.5,405.6,203,203,0,0,1,16,404.2,278.68,278.68,0,0,0,166.74,448c181.36,0,280.44-147.7,280.44-275.8,0-4.2-.11-8.4-.31-12.5A198.48,198.48,0,0,0,496,109.5Z">
                        </path>
                    </svg></a>
            </div>
        </div>
    </footer>
</x-app-layout>