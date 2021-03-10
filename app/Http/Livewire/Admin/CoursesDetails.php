<?php

namespace App\Http\Livewire\Admin;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesDetails extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $courses = Course::has('sales')->paginate();
        return view('livewire.admin.courses-details', compact('courses'));
    }
}
