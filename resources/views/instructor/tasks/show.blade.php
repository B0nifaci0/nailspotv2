<x-instructor-layout :course="$course">

    <div class="flex justify-between">
        <h1 class="text-2xl font-bold uppercase">
            Detalles tarea
        </h1>
        <a href="{{route('instructor.courses.student.tasks',[$course, $task->user])}}"
            class="text-indigo-600 hover:text-indigo-900">Ver todas </a>

    </div>
    <hr class="mt-2 mb-6" />
    <div class="mb-4">
        <label>Titulo del curso:</label>
        {{$course->name}}
    </div>
    <div class="mb-4">
        <label>tarea:</label>
        {{$task->title}}
    </div>

    @foreach ($task->images as $image)
    <h1>
        {{$image->url}}
    </h1>
    @endforeach
    
    @livewire('instructor.task.score', ['taskuser' => $task])

    @livewire('profile.comments', ['task' => $task->task])

    </x-app-layout>