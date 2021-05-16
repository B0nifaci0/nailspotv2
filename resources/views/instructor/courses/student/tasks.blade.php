<x-instructor-layout :course="$course">
    <div class="my-8">
        @foreach ($course->tasks as $task)
        <div>
            <h1>{{$task->title}}</h1>
            <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                @if ($task->taskUser->where('user_id', $student->id)->where('complete',1)->isEmpty())
                <h1 class="px-4 py-2 font-bold text-white bg-pink-600">No
                    entregada</h1>
                @else
                <a href="{{route('instructor.task.show',[$task, $student])}}"
                    class="text-indigo-600 hover:text-indigo-900 "><button
                        class="px-4 py-2 font-bold text-white bg-pink-600 rounded hover:bg-pink-700">Revisar</button></a>
                @endif
            </td>
        </div>
        @endforeach
    </div>
</x-instructor-layout>