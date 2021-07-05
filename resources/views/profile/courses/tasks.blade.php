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
            <a href="{{ route('profile.courses') }}">Ir a cursos comprados</a>
            <br>
            <a href="{{route('course.status',$course)}}">
                Ir a:{{$course->name}}</a>
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
                            <a href='{{route('profile.task',$item)}}'
                                class="p-2 font-bold text-black bg-blue-300 rounded-md"> Mostrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        @empty
        <p>No tienes tareas en este curso</p>
        @endforelse
    </div>

    <x-slot name="js">

        <script src="https://unpkg.com/pdf-lib@1.4.0"></script>
        <script src="{{asset('/js/certificates/index.js')}}"></script>
        <script src="{{asset('/js/certificates/FileSaver.js')}}"></script>
        <script src="https://unpkg.com/@pdf-lib/fontkit@0.0.4"></script>

    </x-slot>
</x-profile-layout>