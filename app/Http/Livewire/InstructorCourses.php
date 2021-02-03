<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class InstructorCourses extends Component
{

    use WithPagination;
    public $search;

    public function render()
    {

        $courses = Course::whereUserId(auth()->user()->id)
            ->where('name', 'LIKE', "%$this->search%")
            ->paginate(8);
        return view('livewire.instructor-courses', compact('courses'));
    }

    public function clearPage()
    {
        $this->reset('page');
    }
}
