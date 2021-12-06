<section>
    <h1 class="text-2xl uppercase text-bold">Requerimientos del curso: <b class="italic">{{$course->description}}</b>
    </h1>
    <hr class="mt-2 mb-6">

    <article class="mb-4 card">
        <div class="card-body">
            <form wire:submit.prevent="store">
                <input wire:model="description" type="text" class="w-full form-input"
                    placeholder="Agregar requerimiento">
                @error('description')
                <span class="text-sm text-red-500">{{$message}}</span>
                @enderror
                @if ($course->status==1)
                <div class="flex justify-end mt-2">
                    <button class="p-2 mt-5 text-white bg-pink-600 rounded hover:bg-pink-700">Agregar
                        Requerimiento</button>
                </div>
                @endif
            </form>
        </div>
    </article>
    @foreach ($requirements as $item)
    <article class="mb-4 card">
        <div class="bg-gray-100 card-body">
            @if ($requirement->id == $item->id)
            <form wire:submit.prevent="update">
                <input wire:model="requirement.description" class="w-full form-input" type="text">
                @error('requirement.description')
                <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </form>

            @else
            <header class="flex justify-between">
                <h1>{{$item->description}}</h1>
                @if ($course->status==1)
                <div>
                    <i wire:click="edit({{$item}})" class="text-blue-500 cursor-pointer fas fa-edit"></i>
                    <i class="ml-2 text-red-500 cursor-pointer fas fa-trash" wire:click="destroy({{$item}})"></i>
                </div>
                @endif
            </header>
            @endif
        </div>
    </article>
    @endforeach

    <div class="card-footer">
        {{$requirements->links()}}
    </div>

</section>