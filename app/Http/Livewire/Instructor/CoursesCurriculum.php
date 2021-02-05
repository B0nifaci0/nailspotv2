<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;

class CoursesCurriculum extends Component
{
    public $course;

    public function mount(Course $course)
    {
        $this->couurse = $course;
    }

    public function render()
    {
        return view('livewire.instructor.courses-curriculum')->layout('layouts.instructor');
    }
}
