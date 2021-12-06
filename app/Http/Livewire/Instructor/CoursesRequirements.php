<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;
use App\Models\Requirement;
use Livewire\WithPagination;

class CoursesRequirements extends Component
{
    use WithPagination;
    public $course, $requirement, $description;

    public $rules = [
        'requirement.description' => 'required'
    ];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->requirement = new Requirement();
    }

    public function render()
    {
        $requirements = $this->course->requirements()->paginate(10);
        return view('livewire.instructor.courses-requirements', [
            'requirements' => $requirements,
        ]);
    }

    public function store()
    {
        $this->validate([
            'description' => 'required'
        ]);

        $this->course->requirements()->create([
            'description' => $this->description,
            'requirementable_type' => Course::class,
            'requirementable_id' => $this->course->id,
        ]);

        $this->reset('description');
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
