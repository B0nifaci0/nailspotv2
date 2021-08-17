<?php

namespace App\Listeners;

use App\Mail\CourseCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewCourseCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admins=User::whereHas('roles', function($query){
            return $query->where('id', '=', 1);
        })->get();
        foreach ($admins as $key =>$admin) {
            $mailAdmins=new CourseCreated($event->course, $event->user);
            Mail::to($admin->email)->queue($mailAdmins);
        }
    }
}
