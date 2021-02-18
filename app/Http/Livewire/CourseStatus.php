<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{
    use AuthorizesRequests;

    public $course, $current, $lesson, $tasks, $lessons;


    public function mount(Course $course)
    {
        $this->course = $course;
        $this->lessons = $course->lessons()->with('tasks')->get();
        $this->current = $course->lessons()->with('tasks')->first();
        // if (!$this->current) {
        //     $this->current = $course->lessons->last();
        // }
        $this->tasks = $this->lessons->pluck('tasks')->collapse();
        $this->authorize('enrolled', $course);
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;
        $this->tasks = $this->lessons->pluck('tasks')->collapse();
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
