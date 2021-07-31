<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;
use App\Models\Requirement;
use Livewire\WithPagination;

class CoursesRequirements extends Component
{
    use WithPagination;
    public $course, $requirement, $name;

    public $rules = [
        'requirement.name' => 'required'
    ];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->requirement = new Requirement();
    }

    public function render()
    {
        return view('livewire.instructor.courses-requirements',[
            'requirements'=>Requirement::where('course_id',$this->course->id)->paginate(4),
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);

        $this->course->requirements()->create([
            'name' => $this->name,
        ]);
        $this->reset('name');
        $this->course = Course::find($this->course->id);
    }

    public function edit(Requirement $requirement)
    {
        $this->requirement = $requirement;
    }

    public function update()
    {
        $this->validate();
        $this->requirement->save();
        $this->requirement = new Requirement();
        $this->course = Course::find($this->course->id);
    }

    public function destroy(Requirement $requirement)
    {
        $requirement->delete();
        $this->course = Course::find($this->course->id);
    }
}
