<?php

namespace App\View\Components;

use Illuminate\View\Component;

class InstructorLayout extends Component
{
    public $course;

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
