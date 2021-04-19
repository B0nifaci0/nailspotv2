<div class="bg-purple-800 pt-10">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="embed-responsive rounded-xl">
                {!!$current->iframe!!}
            </div>
            <h1 class="text-2xl text-white font-bold pt-5 pb-5">
                {!!$current->name!!}
            </h1>
            <div class="card">
                <div class="card-body flex text-gray-700 font-bold">

                    @if ($this->previous!==null)
                    <a class="cursor-pointer" wire:click="changeLesson({{$this->previous}})">Lección Anterior</a>
                    @endif

                    @if ($this->next)
                    <a wire:click="changeLesson({{$this->next}})" class="cursor-pointer ml-auto">Siguiente Lección </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="card rounded-xl">
            <div class="card-body">
                <h1 class="text-bold text-2xl text-center mb-5">{{$course->name}}</h1>
                <div class="flex items-center mb-2">
                    <img class="h-10 w-10 object-cover rounded-full shadow-lg"
                        src="{{$course->teacher->profile_photo_url}}" alt="">
                    <p class="text-gray-700 text-sm ml-2">{{$course->teacher->name}}</p>
                </div>
            </div>
            <div class="card rounded-xl">
                @livewire('lesson-assignament',['lesson' => $current], key($current->id))
            </div>
        </div>
    </div>

    <section class="container p-5 place-items-center grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($lessons as $item)
        <div class="bg-gray-900 shadow-lg rounded p-3 h-full w-full my-4">
            <div class="group relative">
                <img class="w-full md:w-90 block rounded" src="{{Storage::url($course->image->url)}}" />
                <div
                    class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center group-hover:opacity-100 transition justify-evenly ">
                    {{-- <button
                        class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-heart" viewBox="0 0 16 16">
                            <path
                                d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z" />
                        </svg>
                    </button> --}}

                    <a wire:click='changeLesson({{$item}})'
                        class="hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0 group-hover:opacity-100 transition cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="p-5 mt-auto ">
                <h3 class="text-white text-xl ">Lección
                    @if ($item->final==1)
                    final
                    @endif
                    : {{$item->name}}</h3>
                <p class="text-gray-400">{{$item->description}}</p>
                {{-- {{$tasks}} --}}
                @foreach ($tasks as $e)
                @if ($e->lesson->id == $item->id && $e->user->id == auth()->user()->id)
                @if ($e->status == 1)
                <span class="bg-yellow-300"> Pendiente de calificar </span>
                @else
                <span class="bg-green-300"> Calificacion: {{$e->score}} </span>
                @endif
                @endif
                @endforeach
            </div>
        </div>
        @endforeach
    </section>

</div>