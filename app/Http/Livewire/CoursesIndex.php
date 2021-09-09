<?php

namespace App\Http\Livewire;

use App\Models\Level;
use App\Models\Course;
use App\Models\Category;
use Livewire\WithPagination;

class CoursesIndex extends Componet
{
    use WithPagination;

    public $category_id;
    public $level_id;

    public function render()
    {
        $categories = Category::all();
        $levels = Level::all();

        $courses = Course::whereStatus(3)
            ->category($this->category_id)
            ->level($this->level_id)
            ->latest('id')->paginate(8);

        foreach ($courses as $course) {
            if ($course->image) {
                $course->image->url = $this->getS3URL('courses', $course->id);
            }
        }

        return view('livewire.courses-index', compact('courses', 'levels', 'categories'));
    }

    public function clear()
    {
        $this->reset(['category_id', 'level_id']);
    }

    public function clearPage()
    {
        $this->reset('page');
    }
}
