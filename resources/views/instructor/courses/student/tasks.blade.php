<x-instructor-layout :course="$course">
    @forelse ($course->tasks as $task)
        <article class="mt-4 card">
            <div>
                <div class="card-body">
                    <div class="flex justify-between">
                        <div>
                            <header>
                                <h1>
                                    <i class="mr-1 text-blue-500 far fa-play-circle"></i>
                                    <strong>Leccion :</strong> {{$task->title}}</h1>
                            </header>
                        </div>
                        <div>
                            @if ($task->taskUser->where('user_id', $id)->where('complete',1)->isEmpty())
                            <p class="p-2 font-bold text-black bg-pink-500 text-white rounded-md">Sin entregar</a>
                            @else
                                @if (!$task->taskUser->where('user_id', $id)->where('score','>=', 1)->isEmpty())
                                <a href='{{route('instructor.task.show',[$task, $id])}}'
                                class="p-2 font-bold text-black bg-purple-500 hover:bg-purple-700 text-white rounded-md">Calificada<i class="fa fa-check-square px-1"></i></a>
                                @else
                                <a href='{{route('instructor.task.show',[$task, $id])}}'
                                class="p-2 font-bold text-black bg-purple-500 hover:bg-purple-700 text-white rounded-md">Revisar</a>
                                @endif
                            @endif 
                        </div>
                    </div>
                </div>
            </div>
        </article>
        @empty
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">Mensaje</p>
            <p class="text-sm">No tienes tareas asignadas en este curso.</p>
        </div>
        <!--<p>No tienes tareas en este curso</p>-->
        @endforelse
</x-instructor-layout>