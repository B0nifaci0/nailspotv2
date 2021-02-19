<x-instructor-layout :course="$course">
    <div class="my-8">
        @livewire('instructor.lesson-tasks', ['course' => $course, 'student' =>$student])
    </div>
</x-instructor-layout>