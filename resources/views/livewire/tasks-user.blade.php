@if (session('info'))
<div class="alert alert-primary">
    {{(session('info'))}}
</div>
@endif
<div class="pt-16 bg-purple-800">
    <h1 class="text-2xl font-bold text-center text-white"> Mis Tareas</h1>
</div>
<div class="pt-8 pb-8 bg-purple-800 ">
    @foreach ($course->tasks as $key=>$task)
    <section class="ml-4 mr-4">
        <article class="container mt-4 card" x-data="{open: false}">
            <div>
                <div class="card-body">
                    <header>
                        <h1 class="cursor-pointer" x-on:click="open = !open" wire:click='clear()'>
                            <strong>Tarea {{$key+1}}:</strong> {{$task->title}}</h1>
                        requeridas: {{$task->quantity}}
                    </header>
                    <div x-show="open">
                        {{$task->description}}
                        @if ($task->taskUser->where('user_id',auth()->user()->id)->first())
                        has subido {{$task->taskUser->where('user_id',auth()->user()->id)->first()->images_count}}
                        @if ($task->taskUser->where('user_id',auth()->user()->id)->first()->complete ==true)
                        hola
                        {{$task->taskUser->where('user_id',auth()->user()->id)->first()->complete}}

                        @else
                        <form action="{{ route('profile.courses.image', $task) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
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
                        @endif

                        @else
                        <form action="{{ route('profile.courses.image', $task) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
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
                        @endif

                        <a href="task/show">mostrar</a>

                    </div>
                </div>
        </article>
    </section>
    @endforeach
</div>