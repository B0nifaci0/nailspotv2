<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushChannel;
use NotificationChannels\WebPush\WebPushMessage;
class CommentTaskUserNotification extends Notification
{
    use Queueable;

    public $taskUser, $instructor;
    public function __construct($taskUser, $instructor)
    {
        $this->taskUser=$taskUser;
        $this->instructor=$instructor;
    }

    public function toArray($notifiable){
        return[
            'title'=>'¡Nuevo Comentario!',
            'body'=>'El instructor '.$this->instructor->name.' comento la tarea '.$this->taskUser->task->title.'.',
            'icon'=>$this->instructor->profile_photo_url,
            'action_url'=>route('profile.task',$this->taskUser->task),
        ];
    }
    public function via($notifiable){
        return ['database',WebPushChannel::class];
    }
    public function toWebPush($notifiable, $notification){
        return (new WebPushMessage)
                    ->title('¡Nuevo Comentario!')
                    ->body('El instructor '.$this->instructor->name.' comento la tarea '.$this->taskUser->task->title.'.')
                    ->icon($this->instructor->profile_photo_url)
                    ->dir(route('profile.task',$this->taskUser->task));   
    }
}
