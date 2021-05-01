<div class="card">
    <div class="card-body bg-gray-200">
        @foreach ($course->lessons->sortBy('final') as $key=>$item)
        <article class="mt-4 card" x-data="{open: false}">
            <div>
                <div class="card-body">
                    @if ($lesson->id == $item->id)
                    <div class="flex items-center">
                        <label class="w-32">Nombre</label>
                        <input wire:model="lesson.name" type="text" class="form-input w-full">
                    </div>
                    @error('lesson.name')
                    <span class="text-sx text-red-500">{{$message}}</span>
                    @enderror
                    <div class="flex items-center mt-4">
                        <label class="w-32">Url</label>
                        <input wire:model="lesson.url" type="text" class="form-input w-full">
                    </div>
                    @error('lesson.url')
                    <span class="text-sx text-red-500">{{$message}}</span>
                    @enderror
                    <div class="flex items-center mt-4">
                        <label class="w-32"> Descripcion</label>
                        <textarea class="form-input w-full" wire:model="lesson.description"></textarea>
                    </div>
                    @error('lesson.description')
                    <span class="text-sx text-red-500">{{$message}}</span>
                    @enderror
                    <br>
                    <div class="mt-4 flex justify-end">
                        <button class="text-center bg-red-500 text-white font-bold py-2 px-4
                                rounded" wire:click="cancel()">Cancelar</button>
                        <button class="ml-2 text-center bg-blue-500 text-white font-bold py-2 px-4
                                rounded" wire:click="update({{$item}})">Actualizar</button>
                    </div>
                    @else
                    <header>
                        <h1 class="cursor-pointer" x-on:click="open = !open">
                            <i class="far fa-play-circle text-blue-500 mr-1"></i>
                            <strong>Leccion {{$key+1}}:</strong> {{$item->name}}</h1>
                        @if (!$course->final)
                        Leccion Final: <i class="fas fa-toggle-off text-2xl" wire:click='check({{$item}})'></i>
                        @endif
                        @if ($item->final==1)
                        Leccion Final: <i class="fas fa-toggle-on text-2xl text-blue-500"
                            wire:click='uncheck({{$item}})'></i>
                        @endif
                    </header>
                    <div x-show="open">
                        <hr class="my-2">
                        <p class="text-sm">Enlace: <a class="text-blue-600" href="{{$item->url}}"
                                target="_nlank">{{$item->url}}</a></p>
                        <div class="mt-2">
                            <button class="text-center bg-blue-500 text-white font-bold py-2 px-4
                                    rounded" wire:click="edit({{$item}})">Editar</button>
                            <button class="text-center bg-red-500 text-white font-bold py-2 px-4
                                rounded" wire:click="destroy({{$item}})">Eliminar</button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </article>
        @endforeach
        <div x-data="{open: false}" class="mt-4">
            <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
                <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
                Agregar Lección
            </a>
            <article class="card" x-show="open">
                <div class="card-body">
                    <h1 class="text-xl font-bold mb-4">Agregar nueva Lección</h1>
                    <div class="mb-4">
                        <div class="flex items-center">
                            <label class="w-32">Nombre:</label>
                            <input wire:model="name" type="text" class="form-input w-full">
                        </div>
                        @error('name')
                        <span class="text-sx text-red-500">{{$message}}</span>
                        @enderror
                        <div class="flex items-center mt-4">
                            <label class="w-32">Url:</label>
                            <input wire:model="url" type="text" class="form-input w-full">
                        </div>
                        @error('url')
                        <span class="text-sx text-red-500">{{$message}}</span>
                        @enderror
                        <div class="flex items-center mt-4">
                            <label class="w-32"> Descripcion</label>
                            <textarea class="form-input w-full" wire:model="description"></textarea>
                        </div>
                        @error('description')
                        <span class="text-sx text-red-500">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <button class="bg-red-500 text-white font-bold py-2 px-4
                                rounded" x-on:click="open = false">Cancelar</button>
                        <button class="text-white font-bold py-2 px-4
                                    rounded bg-green-500 ml-2" wire:click="store()">Agregar</button>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>