<div class="card">
    <div class="bg-gray-200 card-body">
        @foreach ($course->tasks as $key=>$item)
        <article class="mt-4 card" x-data="{open: false}">
            <div>
                <div class="card-body">
                    @if ($task->id == $item->id)
                    <div class="flex items-center">
                        <label class="w-32">Nombre</label>
                        <input wire:model="task.title" type="text" class="w-full form-input">
                    </div>
                    @error('task.title')
                    <span class="text-red-500 text-sx">{{$message}}</span>
                    @enderror
                    <div class="flex items-center mt-4">
                        <label class="w-32"> Descripcion</label>
                        <textarea class="w-full form-input" wire:model="task.description"></textarea>
                    </div>
                    @error('task.description')
                    <span class="text-red-500 text-sx">{{$message}}</span>
                    @enderror
                    <div class="flex items-center mt-4">
                        <label class="w-32"> Fotos requeridas:</label>
                        <input type="number" wire:model="task.quantity">
                    </div>
                    @error('task.quantity')
                    <span class="text-red-500 text-sx">{{$message}}</span>
                    @enderror
                    <br>
                    <div class="flex justify-end mt-4">
                        <button class="px-4 py-2 font-bold text-center text-white bg-red-500 rounded"
                            wire:click="cancel()">Cancelar</button>
                        <button class="px-4 py-2 ml-2 font-bold text-center text-white bg-blue-500 rounded"
                            wire:click="update({{$item}})">Actualizar</button>
                    </div>
                    @else
                    <header>
                        <h1 class="cursor-pointer" x-on:click="open = !open"> <strong>Tarea {{$key+1}}:</strong>
                            {{$item->title}}</h1>

                    </header>
                    <div x-show="open">

                        <div class="mt-2">
                            <button class="px-4 py-2 font-bold text-center text-white bg-blue-500 rounded"
                                wire:click="edit({{$item}})">Editar</button>
                            <button class="px-4 py-2 font-bold text-center text-white bg-red-500 rounded"
                                wire:click="destroy({{$item}})">Eliminar</button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </article>
        @endforeach
        <div x-data="{open: false}" class="mt-4">
            <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
                <i class="mr-2 text-2xl text-red-500 far fa-plus-square"></i>
                Agregar Tarea
            </a>
            <article class="card" x-show="open">
                <div class="card-body">
                    <h1 class="mb-4 text-xl font-bold">Agregar nueva Tarea</h1>
                    <div class="mb-4">
                        <div class="flex items-center">
                            <label class="w-32">Nombre:</label>
                            <input wire:model="title" type="text" class="w-full form-input">
                        </div>
                        @error('title')
                        <span class="text-red-500 text-sx">{{$message}}</span>
                        @enderror
                        <div class="flex items-center mt-4">
                            <label class="w-32"> Descripcion:</label>
                            <textarea class="w-full form-input" wire:model="description"></textarea>
                        </div>
                        @error('description')
                        <span class="text-red-500 text-sx">{{$message}}</span>
                        @enderror
                        <div class="flex items-center mt-4">
                            <label class="w-32"> Fotos requeridas:</label>
                            <input type="number" wire:model="quantity">
                        </div>
                        @error('quantity')
                        <span class="text-red-500 text-sx">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <button class="px-4 py-2 font-bold text-white bg-red-500 rounded"
                            x-on:click="open = false">Cancelar</button>
                        <button class="px-4 py-2 ml-2 font-bold text-white bg-green-500 rounded"
                            wire:click="store()">Agregar</button>
                    </div>
                </div>
            </article>
        </div>
    </div>
</div>