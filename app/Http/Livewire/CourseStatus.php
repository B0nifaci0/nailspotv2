<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class CourseStatus extends Component
{
    use AuthorizesRequests;

    public $course, $current;


    public function mount(Course $course)
    {
        $this->current = $course->lessons->first();
        $this->authorize('enrolled', $course);
    }

    public function render()
    {
        return view('livewire.course-status');
    }
}
