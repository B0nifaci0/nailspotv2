<x-app-layout>

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
                class="p-2 fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center bg-black bg-opacity-75">
                <div @click.away="imgModal = ''" class="flex flex-col max-w-3xl max-h-full overflow-auto">
                    <div class="z-50">
                        <button @click="imgModal = ''" class="float-right pt-2 pr-2 outline-none focus:outline-none">
                            <svg class="fill-current text-white " xmlns="http://www.w3.org/2000/svg" width="18"
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
    <div class="relative pt-16 flex content-center items-center justify-center">
    </div>
    <div class="container py-8">
        <h1 class="text-2xl font-bold uppercase">
            Competencia {{$participant->competence->name}} Criterio {{$criterion->name}}
        </h1>
        <a href="{{route('judge.competences.participants', [$participant->competence, $criterion])}}"
            class="text-indigo-600 hover:text-indigo-900">Regresar</a>
        <hr class="mt-2 mb-6" />

        <h1 class="text-2xl font-bold mt-8 mb-2">Recursos</h1>

        <div x-data="{}" class="px-2">
            <div class="flex -mx-2">
                @foreach ($participant->images as $image)
                <div class="w-1/6 px-2">
                    <div class="bg-gray-400">
                        <a @click="$dispatch('img-modal', {  imgModalSrc: '{{Storage::url($image->url)}}'})"
                            class="cursor-pointer">
                            <img alt="Placeholder" class="object-fit w-full" src="{{Storage::url($image->url)}}">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <form method="POST" action="{{ route('judge.competences.score',['participant' => $participant, $criterion]) }}">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                @if ($score)
                <div>
                    <label>Calificacion {{$score}}</label>
                </div>
                @else
                <div>
                    <label>Calificacion</label>
                    <select name="score" class="form-input block w-full mt-1">
                        @for ($i = 1; $i < 11; $i++) <option>{{$i}}
                            </option>
                            @endfor
                    </select>
                </div>
                <button type="submit"
                    class="block text-center bg-blue-500 text-white font-bold py-2 px-4 rounded">Calificar</button>
                @endif
            </div>

        </form>
    </div>

</x-app-layout>