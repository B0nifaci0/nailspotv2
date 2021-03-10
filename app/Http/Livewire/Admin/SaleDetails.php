<?php

namespace App\Http\Livewire\Admin;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class SaleDetails extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $course;

    public function mount(Course $course)
    {
        $this->course = $course;
    }

    public function render()
    {
        $details = $this->course->sales()->paginate();

        return view('livewire.admin.sale-details', compact('details'));
    }

    public function clearPage()
    {
        $this->reset('page');
    }
}
