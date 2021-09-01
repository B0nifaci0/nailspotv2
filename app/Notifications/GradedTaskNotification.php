<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;
class GradedTaskNotification extends Notification
{
    use Queueable;

    public $taskUser, $course;
    public function __construct($taskUser, $course)
    {
        $this->taskUser=$taskUser;
        $this->course=$course;
    }

    public function via($notifiable)
    {
        return ['database', WebPushChannel::class];
    }

    public function toArray($notifiable){
        return[
            'title'=>'¡Tarea Calificada!',
            'body'=>'La tarea '.$this->taskUser->task->title.' ha sido calificada.',
            'icon'=>$this->course->teacher->profile_photo_url,
            'action_url'=>route('profile.task',$this->taskUser->task),
        ];
    }
    public function toWebPush($notifiable, $notification){
        return (new WebPushMessage)
                    ->title('Tarea Calificada!')
                    ->body('La tarea '.$this->taskUser->task->title.' ha sido calificada.')
                    ->icon($this->course->teacher->profile_photo_url)
                    ->dir(route('profile.task',$this->taskUser->task));   
    }
}
