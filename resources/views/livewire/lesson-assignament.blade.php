<div class="card">
    @if ($task)
    @if($task->status == 1)
    <span class="bg-yellow-200">Por calificar</span>
    @else
    <span class="bg-green-200">Calificada</span>
    @endif
    @else
    <form wire:submit.prevent='save'>
        <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
            <div class="md:flex">
                <div class="w-full">
                    <div class="p-4 border-b-2"> <span class="text-lg font-bold text-gray-600">Agregar tarea</span>
                    </div>
                    <div class="p-3">
                        <div class="mb-2"> <span class="text-sm">Titulo</span> <input type="text"
                                class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
                        </div>
                        <div class="mb-2"> <span>Tarea</span>
                            <div class="rounded-lg border-2 border-gray-200 flex justify-center items-center ">
                                <label
                                    class=" w-full flex flex-col items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue-500 hover:text-white">
                                    <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path
                                            d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                    </svg>
                                    <span class="mt-2 text-base leading-normal">Select a file</span>
                                    <input type='file' class="hidden" wire:model='file' />
                                </label>

                            </div>
                        </div>
                        <div class="text-blue-500 font-bold mt-1" wire:loading wire:target='file'>
                            Cargando...
                        </div>
                        <div class="mt-3 text-center pb-3">
                            <button
                                class="w-full h-12 text-lg bg-blue-600 rounded text-white hover:bg-blue-700">Subir</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @error('file')
        <span> {{$message}}</span>
        @enderror
    </form>
    @endif
</div>