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
        <div class="card rounded-xl">
            @foreach ($course->tasks as $key=>$task)
            <article class="mt-4 card" x-data="{open: false}">
                <div>
                    <div class="card-body">
                        <header>
                            <h1 class="cursor-pointer" x-on:click="open = !open">
                                <strong>Tarea {{$key+1}}:</strong> {{$task->title}}</h1>
                        </header>
                        <div x-show="open">
                            {{$task->description}}
                            <form action="{{ route('profile.courses.image', $task) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                Selecciona una imagen
                                <div class="flex items-center justify-center w-full bg-grey-lighter">
                                    <label
                                        class="flex flex-col items-center w-64 px-4 py-6 mt-8 mb-8 tracking-wide uppercase bg-white border border-purple-800 rounded-lg shadow-lg cursor-pointer text-blue hover:bg-purple-700 hover:text-white ">
                                        <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path
                                                d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                        </svg>
                                        <span class="mt-2 text-base leading-normal">Selecciona un archivo</span>
                                        <input type='file' class="hidden" name="image" id="fileToUpload" />
                                    </label>
                                </div>
                                <button
                                    class="block w-full px-4 py-2 mt-4 font-semibold text-center text-pink-700 bg-transparent border border-pink-800 rounded hover:bg-pink-500 hover:text-white hover:border-transparent "
                                    type="submit">Enviar</button>
                            </form>

                            <div x-data="{}" class="px-2 mt-8 mb-8 ">
                                <div class="flex -mx-2">
                                    {{-- @foreach ($task->images as $image)
                                    <div class="w-2/6 px-2 ">
                                        <div class="">
                                            <a @click="$dispatch('img-modal', {  imgModalSrc: '{{Storage::url($image->url)}}'})"
                                    class="cursor-pointer">
                                    <img alt="Placeholder" class="w-full object-fit rounded-xl"
                                        src="{{Storage::url($image->url)}}">
                                    </a>
                                </div>
                            </div>
                            @endforeach --}}
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </article>
    @endforeach
</div>
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