<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Task;
use App\Models\Course;
use App\Models\Lesson;
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
            ->latest('id')
            ->paginate(8);

        return view('livewire.instructor.courses-index', compact('courses'));
    }

    public function clearPage()
    {
        $this->reset('page');
    }
}
