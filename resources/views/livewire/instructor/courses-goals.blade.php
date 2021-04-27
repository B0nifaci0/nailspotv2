<section>
    <h1 class="text-2xl uppercase text-bold">Metas del curso</h1>
    <hr class="mb-6 mt-2">

    @foreach ($course->goals as $item)
    <article class="card mb-4">
        <div class="card-body bg-gray-100">
            @if ($goal->id == $item->id)
            <form wire:submit.prevent="update">
                <input wire:model="goal.name" class="form-input w-full" type="text">
                @error('goal.name')
                <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </form>

            @else
            <header class="flex justify-between">
                <h1>{{$item->name}}</h1>
                <div>
                    <i wire:click="edit({{$item}})" class="fas fa-edit text-blue-500 cursor-pointer"></i>
                    <i class="fas fa-trash text-red-500 cursor-pointer ml-2" wire:click="destroy({{$item}})"></i>
                </div>
            </header>
            @endif
        </div>
    </article>
    @endforeach

    <article class="card">
<div class="card-body">
    <form wire:submit.prevent="store">
        <input wire:model="name" type="text" class="form-input w-full" placeholder="Agregar Meta">
        @error('name')
            <span class="text-sm text-red-500">{{$message}}</span>
        @enderror
        <div class="flex justify-end mt-5">
            <button class="bg-pink-600  hover:bg-pink-700 text-white p-2 rounded">Agregar meta</button>
        </div>
    </form>
</div>
    </article>

</section>