<div class="pt-10 bg-purple-800">
    <div class="container grid grid-cols-1 gap-8 lg:grid-cols-3">
        <div class="lg:col-span-2">
            <div class="embed-responsive rounded-xl">
                {!!$current->iframe!!}
            </div>
            <h1 class="pt-5 pb-5 text-2xl font-bold text-white">
                {!!$current->name!!}
            </h1>
            <div class="card">
                <div class="flex font-bold text-gray-700 card-body">

                    @if ($this->previous!==null)
                    <a class="cursor-pointer" wire:click="changeLesson({{$this->previous}})">Lección Anterior</a>
                    @endif

                    @if ($this->next)
                    <a wire:click="changeLesson({{$this->next}})" class="ml-auto cursor-pointer">Siguiente Lección </a>
                    @endif
                </div>
            </div>
        </div>

        <a href="{{ route('course.tasks', $course) }}" class="text-white text-md font-bold"> Ver tareas   <i class=" fas fa-arrow-right"> </i></a>
    </div>

    <section class="container grid grid-cols-1 gap-4 p-5 place-items-center sm:grid-cols-2 md:grid-cols-3">
        @foreach ($lessons as $item)
        <div class="w-full h-full p-3 my-4 bg-white rounded shadow-lg">
            <div class="relative group">
                <img class="block w-full rounded md:w-90" src="{{Storage::url($course->image->url)}}" />
                <div
                    class="absolute top-0 flex items-center w-full h-full transition bg-black bg-opacity-0 rounded group-hover:bg-opacity-60 group-hover:opacity-100 justify-evenly ">
                    <a wire:click='changeLesson({{$item}})'
                        class="text-white transition transform translate-y-3 opacity-0 cursor-pointer hover:scale-110 group-hover:translate-y-0 group-hover:opacity-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                            class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="p-5 mt-auto ">
                <h3 class="text-xl text-gray-800 ">Lección

                    : {{$item->name}}</h3>
                <p class="text-gray-800 text-md">{{$item->description}}</p>
            </div>
        </div>
        @endforeach
    </section>

</div>