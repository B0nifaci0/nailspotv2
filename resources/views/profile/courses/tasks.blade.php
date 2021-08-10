<x-profile-layout>

    @if (session('info'))
    <div class="alert alert-primary">
        {{(session('info'))}}
    </div>
    @endif
    <div>
        <div>
            <h1 class="mb-2 text-2xl font-bold uppercase">Tareas</h1>
            @can('approved',$course->certificate)
            <div class="mt-5 card-body">
                <input type="hidden" name="Name" id="name" value="{{auth()->user()->name}}">
                <input type="hidden" id="url" value="{{$course->certificate->url}}">
                <button id="submitBtn" class="p-2 font-bold text-white bg-blue-600 rounded-md">Obtener
                    certificado</button>
            </div>
            @endcan
            <div class="container block flex justify-between overflow-hidden">
                <div class="inline-block px-1">
                    <button class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                        <a href="{{route('course.status',$course)}}" class="break-words">
                            Ir a curso: {{$course->name}} <i class="far fa-arrow-alt-circle-right fa-lg"></i></a>
                    </button>
                </div>
                <div class="inline-block px-2">
                    <button class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded">
                        <a href="{{ route('profile.courses') }}" class="break-words">Volver a cursos comprados <i class="fas fa-arrow-alt-circle-left fa-lg"></i></a>
                    </button>
                </div>
            </div>
        </div>

        <hr class="mt-2 mb-6" />

        @forelse ($tasks as $item)
        <article class="mt-4 card">
            <div>
                <div class="card-body">
                    <div class="flex justify-between">
                        <div>
                            <header>
                                <h1>
                                    <i class="mr-1 text-blue-500 far fa-play-circle"></i>
                                    <strong>Leccion :</strong> {{$item->title}}</h1>
                            </header>
                        </div>
                        <div>
                            @if ($item->taskUser->where('user_id', auth()->user()->id)->where('complete',1)->isEmpty())
                            <a href='{{route('profile.task',$item)}}'
                                class="p-2 font-bold text-black bg-pink-500 hover:bg-pink-700 text-white rounded-md">Sin entregar</a>
                            @else
                                @if (!$item->taskUser->where('user_id', auth()->user()->id)->where('score','>=', 1)->isEmpty())
                                <a href='{{route('profile.task',$item)}}'
                                class="p-2 font-bold text-black bg-purple-500 hover:bg-purple-700 text-white rounded-md">Calificada<i class="fa fa-check-square px-1"></i></a>
                                @else
                                <a href='{{route('profile.task',$item)}}'
                                class="p-2 font-bold text-black bg-purple-500 hover:bg-purple-700 text-white rounded-md">Entregada</a>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </article>
        @empty
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">Mensaje</p>
            <p class="text-sm">No tienes tareas asignadas en este curso.</p>
        </div>
        <!--<p>No tienes tareas en este curso</p>-->
        @endforelse
    </div>

    <x-slot name="js">

        <script src="https://unpkg.com/pdf-lib@1.4.0"></script>
        <script src="{{asset('/js/certificates/index.js')}}"></script>
        <script src="{{asset('/js/certificates/FileSaver.js')}}"></script>
        <script src="https://unpkg.com/@pdf-lib/fontkit@0.0.4"></script>

    </x-slot>
</x-profile-layout>