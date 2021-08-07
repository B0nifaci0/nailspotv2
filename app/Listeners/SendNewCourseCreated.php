<?php

namespace App\Listeners;

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
            return $query->where('name', '=', 'Admin');
        })->take(3)->get();
        foreach ($admins as $key =>$admin) {
            Mail::send('mail.course-created', ['course'=>$event->course, 'user'=>$event->user], function($message) use ($admin){
                $message->from('registro@nailspot.com.mx', 'Nailspot');
                $message->subject('Nuevo Curso Creado');
                $message->to($admin->email);
            });
        }
    }
}
