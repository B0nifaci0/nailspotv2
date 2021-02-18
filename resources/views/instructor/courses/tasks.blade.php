<x-instructor-layout :course="$course">
    <div class="my-8">
        @livewire('instructor.tasks', ['course' => $course, 'student' =>$student, 'tasks' => $tasks],key('tasks'.$course->id))
    </div>
</x-instructor-layout>