<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Goal;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
class CoursesGoals extends Component
{
    use WithPagination;
    public $course, $goal, $name;

    public $rules = [
        'goal.name' => 'required'
    ];

    public function mount(Course $course)
    {
        $this->course = $course;
        $this->goal = new Goal();
    }

    public function render() 
    {
        return view('livewire.instructor.courses-goals',[
            'goals'=>Goal::where('course_id',$this->course->id)->paginate(4),
        ]);
    }

    public function store()
    {
        $this->validate([
            'name' => 'required'
        ]);

        $this->course->goals()->create([
            'name' => $this->name,
        ]);
        $this->reset('name');
        $this->course = Course::find($this->course->id);
    }

    public function edit(Goal $goal)
    {
        $this->goal = $goal;
    }

    public function update()
    {
        $this->validate();
        $this->goal->save();
        $this->goal = new Goal();
        $this->course = Course::find($this->course->id);
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();
        $this->course = Course::find($this->course->id);
    }
}
