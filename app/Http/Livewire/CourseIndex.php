<?php

namespace App\Http\Livewire;

use App\Models\Level;
use App\Models\Course;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CourseIndex extends Component
{
    public $category_id;
    public $level_id;
    use WithPagination;

    public function render()
    {
        $categories = Category::all();
        $levels = Level::all();

        $courses = Course::whereStatus(3)
            ->category($this->category_id)
            ->level($this->level_id)
            ->latest('id')->paginate(8);

        return view('livewire.course-index', compact('courses', 'levels', 'categories'));
    }

    public function clear()
    {
        $this->reset(['category_id', 'level_id']);
    }
}
