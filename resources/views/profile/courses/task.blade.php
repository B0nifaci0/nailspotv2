<x-profile-layout>

    <div class="flex justify-between">
        <h1 class="text-2xl font-bold uppercase">
            Detalles tarea
        </h1>
        <a class="text-indigo-600 hover:text-indigo-900" href='{{ route('profile.courses.tasks', $course) }}'>Ver todas
        </a>

    </div>
    <hr class="mt-2 mb-6" />
    <div class="mb-4">
        <label>Titulo del curso</label>
        {{$course->name}}
    </div>


    {{-- {{($taskUser->score) ? 'calificacion:'.$taskUser->score : ' '}} --}}

    {{-- @forelse ($taskUser->images as $image)
    <img alt="Placeholder" class="w-full object-fit rounded-xl" src="{{Storage::url($image->url)}}">
    @endforeach --}}

    <div>
        @livewire('profile.comments', ['task' => $task])
    </div>
</x-profile-layout>