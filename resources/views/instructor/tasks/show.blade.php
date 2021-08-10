<x-instructor-layout :course="$course">

    <div class="flex justify-between">
        <h1 class="text-2xl font-bold uppercase">
            Detalles tarea
        </h1>
        <a href="{{route('instructor.courses.student.tasks',[$course, $taskUser->user->id])}}"
            class="text-indigo-600 hover:text-indigo-900">Ver todas </a>

    </div>
    <hr class="mt-2 mb-6" />
    <div class="mb-2">
        <label class="text-xl font-bold">Estudiante:</label>
        {{$taskUser->user->name}}
    </div>
    <div class="mb-4">
        <label class="text-xl font-bold">Titulo del curso:</label>
        {{$course->name}}
    </div>
    <div class="mb-4">
        <label class="text-lg font-bold">Tarea:</label>
        {{$task->title}}
    </div>

    @foreach ($taskUser->images as $image)

    <img alt="Placeholder" class="w-full rounded-lg object-fit" src="{{Storage::url($image->url)}}"><br><hr style="border: 2px solid blue"><br>

    <!--<h1>
        {{$image->url}} 
    </h1>-->
    @endforeach

    @livewire('instructor.task.score', ['taskuser' => $taskUser])

    @livewire('profile.comments', ['taskUser' => $taskUser])

    </x-app-layout>