<x-profile-layout>
    <div>
        <div>
            <h1 class="text-2xl font-bold uppercase mb-2">Tareas</h1>
            @can('approved',$course->certificate)
            <div class="card-body mt-5">
                <input type="hidden" name="Name" id="name" value="{{auth()->user()->name}}">
                <input type="hidden" id="url" value="{{$course->certificate->url}}">
                <button id="submitBtn" class="bg-blue-600 font-bold text-white rounded-md p-2">Obtener
                    certificado</button>
            </div>
            @endcan
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
                                    <i class="far fa-play-circle text-blue-500 mr-1"></i>
                                    @if ($item->lesson->final)
                                    <strong>Leccion Final:</strong> {{$item->lesson->name}}</h1>
                                    @else
                                    <strong>Leccion :</strong> {{$item->lesson->name}}</h1>
                                    @endif
                            </header>
                        </div>
                        <div>
                            @if ($item->status == 1)
                            <a href='{{route('profile.task',$item)}}'
                                class="bg-yellow-300 font-bold text-black rounded-md p-2"> Pendiente</a>
                            @else
                            <a class="bg-green-600 font-bold text-black rounded-md p-2"
                                href='{{route('profile.task',$item)}}'>
                                Calificación:
                                {{$item->score}}</a>
                            @endif
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