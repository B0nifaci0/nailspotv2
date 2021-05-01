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
    </div>

    <section class="container p-5 place-items-center grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
        @foreach ($lessons as $item)
        <div class="bg-white shadow-lg rounded p-3 h-full w-full my-4">
            <div class="group relative">
                <img class="w-full md:w-90 block rounded" src="{{Storage::url($course->image->url)}}" />
                <div class="absolute bg-black rounded bg-opacity-0 group-hover:bg-opacity-60 w-full h-full top-0 flex items-center 
                    <a wire:click='changeLesson({{$item}})'
                        class=" hover:scale-110 text-white opacity-0 transform translate-y-3 group-hover:translate-y-0
                    group-hover:opacity-100 transition cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-play-circle-fill" viewBox="0 0 16 16">
                        <path
                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z" />
                    </svg>
                    </a>
                </div>
            </div>
            <div class="p-5 mt-auto ">
                <h3 class="text-gray-800 text-xl ">Lección
                    : {{$item->name}}</h3>
                <p class="text-gray-800 text-md">{{$item->description}}</p>

            </div>
        </div>
        @endforeach
    </section>

</div>