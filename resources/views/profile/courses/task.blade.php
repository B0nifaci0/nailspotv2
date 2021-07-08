<x-profile-layout>

    <div x-data="{ imgModal : false, imgModalSrc : '', imgModalDesc : '' }">
        <template
            @img-modal.window="imgModal = true; imgModalSrc = $event.detail.imgModalSrc; imgModalDesc = $event.detail.imgModalDesc;"
            x-if="imgModal">
            <div x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-90" x-on:click.away="imgModalSrc = ''"
                class="fixed inset-0 z-50 flex items-center justify-center w-full p-2 overflow-hidden bg-black bg-opacity-75 h-100">
                <div @click.away="imgModal = ''" class="flex flex-col max-w-3xl max-h-full overflow-auto">
                    <div class="z-50">
                        <button @click="imgModal = ''" class="float-right pt-2 pr-2 outline-none focus:outline-none">
                            <svg class="text-white fill-current " xmlns="http://www.w3.org/2000/svg" width="18"
                                height="18" viewBox="0 0 18 18">
                                <path
                                    d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <div class="p-2">
                        <img :alt="imgModalSrc" class="object-contain h-1/2-screen" :src="imgModalSrc">
                        <p x-text="imgModalDesc" class="text-center text-white"></p>
                    </div>
                </div>
            </div>
        </template>
    </div>

    <div class="flex justify-between">
        <h1 class="text-2xl font-bold uppercase">
            Tarea {{$task->title}}
        </h1>
        <a class="text-indigo-600 hover:text-indigo-900" href='{{ route('profile.courses') }}'>Ver
            todos
        </a>
    </div>
    <hr class="mt-2 mb-6" />
    <div class="mb-4">
    </div>

    <h1 class="mt-8 mb-2 text-2xl font-bold">Recursos</h1>
    <p class="font-bold"><i class="fas fa-exclamation-circle"></i> Nota: Las imagenes a entregar deben de ser tomadas
        desde los siguientes angulos (Derecho, Izquierdo, Perfil)</p>

    @if ($taskUser)
    @if ($taskUser->images_count < $task->quantity)
        <form action="{{ route('profile.courses.image', $task) }}" method="post" enctype="multipart/form-data">
            @csrf
            Selecciona una imagen
            <!--<input type="file" name="image" id="fileToUpload">-->
            <div class="flex items-center justify-center w-full bg-grey-lighter">
                <label
                    class="flex flex-col items-center w-64 px-4 py-6 mt-8 mb-8 tracking-wide uppercase bg-white border border-purple-800 rounded-lg shadow-lg cursor-pointer text-blue hover:bg-purple-700 hover:text-white ">
                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                    </svg>
                    <span class="mt-2 text-base leading-normal">Selecciona un archivo</span>
                    <input type='file' class="hidden" name="image" id="fileToUpload" />
                </label>
            </div>
            <button
                class="block w-full px-4 py-2 mt-4 font-semibold text-center text-pink-700 bg-transparent border border-pink-800 rounded hover:bg-pink-500 hover:text-white hover:border-transparent rounded-xl"
                type="submit">Enviar</button>
        </form>
        @endif
        @else
        <form action="{{ route('profile.courses.image', $task) }}" method="post" enctype="multipart/form-data">
            @csrf
            Selecciona una imagen
            <!--<input type="file" name="image" id="fileToUpload">-->
            <div class="flex items-center justify-center w-full bg-grey-lighter">
                <label
                    class="flex flex-col items-center w-64 px-4 py-6 mt-8 mb-8 tracking-wide uppercase bg-white border border-purple-800 rounded-lg shadow-lg cursor-pointer text-blue hover:bg-purple-700 hover:text-white ">
                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                    </svg>
                    <span class="mt-2 text-base leading-normal">Selecciona un archivo</span>
                    <input type='file' class="hidden" name="image" id="fileToUpload" />
                </label>
            </div>
            <button
                class="block w-full px-4 py-2 mt-4 font-semibold text-center text-pink-700 bg-transparent border border-pink-800 rounded hover:bg-pink-500 hover:text-white hover:border-transparent rounded-xl"
                type="submit">Enviar</button>
        </form>

        @endif

        @if ($taskUser)
        <div x-data="{}" class="px-2 mt-8 mb-8 ">
            <div class="flex -mx-2">

                @foreach ($taskUser->images as $image)
                <div class="w-2/6 px-2 ">
                    <div class="">
                        <a @click="$dispatch('img-modal', {  imgModalSrc: '{{Storage::url($image->url)}}'})"
                            class="cursor-pointer">
                            <img alt="Placeholder" class="w-full object-fit rounded-xl"
                                src="{{Storage::url($image->url)}}">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        Calificación: {{$taskUser->score}}
        @endif

        <div>
            @livewire('profile.comments', ['taskUser' => $taskUser])
        </div>
</x-profile-layout>