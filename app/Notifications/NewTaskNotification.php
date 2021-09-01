<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;

class NewTaskNotification extends Notification
{
    use Queueable;

    public $course;
    public function __construct($course)
    {
        $this->course=$course;
    }
    public function toArray($notifiable){
        return[
            'title'=>'¡Nueva Tarea!',
            'body'=>'El instructor '.$this->course->teacher->name.' creo una nueva tarea en el curso '.$this->course->name.'.',
            'icon'=>$this->course->teacher->profile_photo_url,
            'action_url'=>route('profile.task',$this->course->tasks->last()),
        ];
    }
    public function via($notifiable){
        return ['database',WebPushChannel::class];
    }
    public function toWebPush($notifiable, $notification){
        return (new WebPushMessage)
                    ->title('¡Nueva Tarea!')
                    ->body('El instructor '.$this->course->teacher->name.' creo una nueva tarea en el curso '.$this->course->name.'.')
                    ->icon($this->course->teacher->profile_photo_url)
                    ->dir(route('profile.task',$this->course->tasks->last()));   
    }
}
