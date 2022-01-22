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
    <div class="relative flex items-center content-center justify-center pt-20 bg-purple-800">
    </div>
    <div class="pt-8 pb-8 bg-purple-800 px-5 pb-24">
        <div class="container bg-white rounded py-5">
            <h1 class="text-3xl font-bold uppercase text-center">
                 {{ $participant->competence->name }} - {{{$participant->level->name}}}
            </h1>
            <a href="{{ route('judge.competences.participants', [$participant->competence->id, $criterion]) }}"
                class="float-right text-lg text-indigo-600 hover:text-indigo-900">Regresar </a>

            <h1 class="mt-8 mb-2 text-2xl font-bold">Recursos</h1>
            <div>
                <p class="text-xl font-bold">Criterio: {{$criterion->name}}</p>
            </div>
            <div x-data="{}" class="px-2">
                <div class="flex -mx-2">
                    @foreach ($participant->images as $image)
                        <div class="w-4/6 px-2">
                            <div class="bg-gray-400">
                                <a @click="$dispatch('img-modal', {  imgModalSrc: '{{ $image->url }}'})"
                                    class="cursor-pointer">
                                    <img alt="Placeholder" class="w-full object-fit" src="{{ $image->url }}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <form method="POST"
                action="{{ route('judge.competences.score', ['participant' => $participant, $criterion]) }}"
                class="pt-5 pb-5">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    @if ($score)
                        <div>
                            <p class="text-xl font-bold text-gray-900">Calificacion: {{ $score }}</p>
                        </div>
                    @else
                        <div>
                            <label>Calificacion</label>
                            <select name="score" class="block w-full mt-1 form-input">
                                @for ($i = 1; $i < 11; $i++)
                                    <option>{{ $i }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                        <button type="submit"
                            class="block w-full px-4 py-2 mt-4 font-bold text-center text-white bg-pink-600 hover:bg-pink-700 rounded-xl">
                            Calificar
                        </button>
                    @endif
                </div>

            </form>
        </div>
    </div>

</x-app-layout>
