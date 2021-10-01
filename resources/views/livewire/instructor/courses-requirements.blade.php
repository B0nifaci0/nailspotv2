
<section>
    <h1 class="text-2xl uppercase text-bold">Requerimientos del curso: <b class="italic">{{$course->name}}</b></h1>
    <hr class="mb-6 mt-2">

    <article class="card mb-4">
        <div class="card-body">
            <form wire:submit.prevent="store">
                <input wire:model="name" type="text" class="form-input w-full" placeholder="Agregar requerimiento">
                @error('name')
                <span class="text-sm text-red-500">{{$message}}</span>
                @enderror
                @if ($course->status==1)
                    <div class="flex justify-end mt-2">
                        <button class="bg-pink-600 hover:bg-pink-700 text-white p-2 mt-5 rounded">Agregar Requerimiento</button>
                    </div>
                @endif
            </form>
        </div>
    </article>

    @foreach ($requirements as $item)
    <article class="card mb-4">
        <div class="card-body bg-gray-100">
            @if ($requirement->id == $item->id)
            <form wire:submit.prevent="update">
                <input wire:model="requirement.name" class="form-input w-full" type="text">
                @error('requirement.name')
                <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </form>

            @else
            <header class="flex justify-between">
                <h1>{{$item->name}}</h1>
                @if ($course->status==1)
                    <div>
                        <i wire:click="edit({{$item}})" class="fas fa-edit text-blue-500 cursor-pointer"></i>
                        <i class="fas fa-trash text-red-500 cursor-pointer ml-2" wire:click="destroy({{$item}})"></i>
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