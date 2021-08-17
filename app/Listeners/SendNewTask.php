<?php

namespace App\Listeners;

use App\Mail\NewTask;
use App\Models\Course;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewTask
{
    
    public function __construct()
    {
     
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $users=Course::with('students')->findOrFail($event->course->id);
        foreach ($users->students as $key =>$student) {
            $studentsMail=new NewTask($event->course);
            Mail::to($student->email)->queue($studentsMail);
        }
    }
}
