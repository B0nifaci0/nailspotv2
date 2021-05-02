<x-instructor-layout :course="$course">
    <div class="my-8">
        @livewire('instructor.courses-tasks', ['course' => $course])
    </div>
</x-instructor-layout>