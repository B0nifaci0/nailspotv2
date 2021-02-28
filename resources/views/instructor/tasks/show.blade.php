<x-instructor-layout :course="$course">

    <div class="flex justify-between">
        <h1 class="text-2xl font-bold uppercase">
            Detalles tarea
        </h1>
        <a href="{{route('instructor.courses.tasks',[$course, $task->user])}}"
            class="text-indigo-600 hover:text-indigo-900">Ver todas </a>

    </div>
    <hr class="mt-2 mb-6" />
    <div class="mb-4">
        <label>Titulo del curso</label>
        <input type="text" name="name" id="name" value="{{old('name',$course->name)}}" readonly class=" form-input block
                            w-full mt-1" />
        @error('name')
        <strong class="text-xs text-red-500">{{$message}}</strong>
        @enderror
    </div>
    <div class="mb-4">
        <label>Leccion</label>
        <input type="text" name="slug" value="{{old('slug',$task->lesson->name)}}" readonly
            class="form-input block w-full mt-1" />
        @error('slug')
        <strong class="text-xs text-red-500">{{$message}}</strong>
        @enderror
    </div>

    <form method="POST" action="{{ route('instructor.task.score',['task' => $task]) }}" enctype="multipart/form-data">
        @csrf @method('PATCH')
        <h1 class="text-2xl font-bold mt-8 mb-2">Recurso de la leccion</h1>
        <div class="grid grid-cols-2 gap-4">
            <figure>
                <img id="picture" src="{{Storage::url($task->url)}}"
                    class="w-full h-64 object-center object-scale-down">
            </figure>
            @if ($task->score)
            <div>
                <label>Calificacion</label>
                <input type="text" readonly value="{{$task->score}}" class="form-input">
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
            @endif
        </div>
        <div>
            <div class="flex">
                <a href="{{route('instructor.download.tasks', $task)}}"
                    class="justify-start bg-grey-light hover:bg-grey text-grey-darkest font-bold py-2 px-4 rounded inline-flex items-center">
                    <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" /></svg>
                    <span>Download</span>
                </a>
                @if (!$task->score)
                <button type="submit"
                    class="justify-end ml-auto block text-center bg-blue-500 text-white font-bold py-2 px-4 rounded">Actualizar
                    informacion</button>
                @endif
            </div>
        </div>
    </form>

    <x-slot name="js">

    </x-slot>
    </x-app-layout>