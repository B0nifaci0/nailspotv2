<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Task;

class InstructorLayout extends Component
{
    public $course, $comments;

    public function __construct($course)
    {
        $this->course = $course;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('layouts.instructor');
    }

}
