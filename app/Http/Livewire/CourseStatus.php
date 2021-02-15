<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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

    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;
    }

    public function getIndexProperty()
    {
        return $this->course->lessons->search($this->current);
    }

    public function getNextProperty()
    {
        if ($this->index != $this->course->lessons->count() - 1) {
            return $this->index + 1;
        } else {
            return null;
        }
    }

    public function getPreviousProperty()
    {
        if ($this->index != 0) {
            return $this->index - 1;
        } else {
            return null;
        }
    }
}
