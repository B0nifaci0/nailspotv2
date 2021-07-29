<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\Assignament;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\TasksCompleted;
use Illuminate\Notifications\Notification;

class SendNotification
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
        $instructor=$event->task->course->user_id;
        $instructor=User::findOrFail($instructor);
        $mail = new Assignament($event->user, $event->task);
        Mail::to($instructor->email)->queue($mail);
        $instructor->notify(new TasksCompleted($event->user, $event->task));
    }
}
