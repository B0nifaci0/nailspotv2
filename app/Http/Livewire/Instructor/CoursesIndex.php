<?php

namespace App\Http\Livewire\Instructor;

use App\Http\Livewire\Componet;
use App\Models\Course;
use Livewire\WithPagination;

class CoursesIndex extends Componet
{

    use WithPagination;
    public $search;

    public function render()
    {
        $courses = Course::whereUserId(auth()->user()->id)
            ->where('name', 'LIKE', "%$this->search%")
            ->latest('id')
            ->paginate(8);

        foreach ($courses as $course) {
            if ($course->image) {
                $course->image->url = $this->getS3URL('courses', $course->id);
            }
        }
        return view('livewire.instructor.courses-index', compact('courses'));
    }

    public function clearPage()
    {
        $this->reset('page');
    }
}
