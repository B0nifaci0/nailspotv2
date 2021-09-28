<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Componet
{
    use AuthorizesRequests;

    public $course, $current, $lessons, $taskUser;


    public function mount(Course $course)
    {
        $this->course = $course;
        $this->authorize('enrolled', $course);

        $this->lessons = $course->lessons()->get();
        $this->current = $course->lessons()->first();
    }

    public function render()
    {
        if ($this->course->image) {
            $this->course->image->url = $this->getS3URL('courses', $this->course->id);
        }
        return view('livewire.course-status');
    }

    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;
    }

    public function getIndexProperty()
    {
        return $this->course->lessons->pluck('id')->search($this->current->id);
    }

    public function getNextProperty()
    {
        if ($this->index == $this->course->lessons->count() - 1) {
            return null;
        } else {
            return $this->course->lessons[$this->index + 1];
        }
    }

    public function getPreviousProperty()
    {
        if ($this->index == 0) {
            return null;
        } else {
            return $this->course->lessons[$this->index - 1];
        }
    }
}
