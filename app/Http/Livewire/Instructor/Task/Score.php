<?php

namespace App\Http\Livewire\Instructor\Task;

use App\Models\Task;
use App\Models\Course;
use Livewire\Component;
use App\Models\TaskUser;
use App\Mail\CourseApproved;
use App\Mail\FailedCourse;
use App\Mail\GradedAssignament;
use Illuminate\Support\Facades\Mail;
use App\Notifications\GradedTaskNotification;

class Score extends Component
{

    public $taskuser, $comment;

    public $selectedScore = NULL;

    public function mount(TaskUser $taskuser)
    {
        $this->taskuser = $taskuser;
    }

    public function render()
    {
        return view('livewire.instructor.task.score');
    }

    public function qualify()
    {
        $taskuser = $this->taskuser;
        $taskuser->score = $this->selectedScore;
        $taskuser->save();
        $mail = new GradedAssignament($taskuser);
        Mail::to($taskuser->user->email)->queue($mail);
        $course = Course::find($taskuser->task->course->id);
        $taskuser->user->notify(new GradedTaskNotification($taskuser, $course));
        
        if($taskuser->score>=8){
            $approved = new CourseApproved($course);
            Mail::to($taskuser->user->email)->queue($approved);
            $certificate = $course->certificate;
            $certificate->students()->attach($taskuser->user->id);
        }else{
            $failed=new FailedCourse($course);
            Mail::to($taskuser->user->email)->queue($failed);    
        }   

    }
}
