<?php

namespace App\Listeners;

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
            Mail::send('mail.new-task', ['course'=>$event->course], function($message) use ($student){
                $message->from('registro@nailspot.com.mx', 'Nailspot');
                $message->subject('Nueva Tarea');
                $message->to($student->email);
            });
        }
    }
}
/*        $users=Course::with('students')->findOrFail($event->course->id);
        foreach ($users->students as $key =>$student) {
            Mail::send('mail.new-task', ['course'=>$event->course], function($message) use ($student){
                $message->from('registro@nailspot.com.mx', 'Nailspot');
                $message->subject('Nueva Tarea');
                $message->to($student->email);
            });
        } */