<div class="mx-auto bg-purple-800">
    <h1 class="text-6xl text-white font-bold mx-auto text-center py-10">Nuevos Cursos</h1>
</div>
<div class="pt-20 pb-12 bg-purple-800">
    <div class="container flex text-gray-700">
        <button class="bg-white shadow rounded-lg h-12 px-4 mr-4" wire:click="clear">
            Todos los cursos
        </button>
        <div class="relative" x-data="{open: false}">
            <button class="block bg-white shadow rounded-lg h-12 px-4 mr-4 overflow-hidden focos:outline-none"
                x-on:click="open=true">
                Categoria
            </button>
            <div class="relative right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
                x-on:click.away="open=false" wire:click="clearPage">
                @foreach ($categories as $category)
                <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                    wire:click="$set('category_id',{{$category->id}})" x-on:click="open= false">{{$category->name}}
                </a>
                @endforeach
            </div>
        </div>

        <div class="relative" x-data="{open: false}">
            <button class="block bg-white shadow rounded-lg h-12 px-4 mr-4 overflow-hidden focos:outline-none"
                x-on:click="open=true">
                Niveles
            </button>
            <div class="relative right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open"
                x-on:click.away="open=false" wire:click="clearPage">
                @foreach ($levels as $level)
                <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-blue-500 hover:text-white"
                    wire:click="$set('level_id',{{$level->id}})" x-on:click="open= false">{{$level->name}}</a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 mt-6">
        @foreach ($courses as $course)
        <x-course-card :course="$course" />
        @endforeach
    </div>
    <div class="max-w-7xl mx-auto lg:px-8 px-4 py-3 justify-between sm:px-6 ">
        {{$courses->links()}}
    </div>
</div>