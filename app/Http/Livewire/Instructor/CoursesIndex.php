<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesIndex extends Component
{

    use WithPagination;
    public $search;

    public function render()
    {

        $courses = Course::whereUserId(auth()->user()->id)
            ->where('name', 'LIKE', "%$this->search%")
            ->paginate(8);
        return view('livewire.instructor.courses-index', compact('courses'));
    }

    public function clearPage()
    {
        $this->reset('page');
    }
}
