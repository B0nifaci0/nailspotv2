<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class CoursesCurriculum extends Component
{
    use AuthorizesRequests;

    public $course;

    public function mount(Course $course)
    {
        $this->couurse = $course;
        $this->authorize('dicatated', $course);
    }

    public function render()
    {
        return view('livewire.instructor.courses-curriculum')->layout('layouts.instructor', ['course' => $this->course]);
    }
}
