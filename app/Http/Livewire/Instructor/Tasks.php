<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\User;
use Livewire\Component;

class Tasks extends Component
{
    public $course, $student, $tasks;

    public function mount(Course $course, User $student, $tasks)
    {
        $this->course = $course;
        $this->student = $student;
        $this->tasks = $tasks;
    }


    public function render()
    {
        return view('livewire.instructor.tasks');
    }
}
