<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;
class CommentTaskInstructorNotification extends Notification
{
    use Queueable;
    public $taskUser;
    public function __construct($taskUser)
    {
        $this->taskUser=$taskUser;
    }

    public function toArray($notifiable){
        return[
            'title'=>'¡Nuevo Comentario!',
            'body'=>'El alumno '.$this->taskUser->user->name.' comento la tarea '.$this->taskUser->task->title.'.',
            'icon'=>$this->taskUser->user->profile_photo_url,
            'action_url'=>route('instructor.task.show',[$this->taskUser->task,$this->taskUser->user->id])
        ];
    }
    public function via($notifiable){
        return ['database',WebPushChannel::class];
    }
    public function toWebPush($notifiable, $notification){
        return (new WebPushMessage)
                    ->title('¡Nuevo Comentario!')
                    ->body('El alumno '.$this->taskUser->user->name.' comento la tarea '.$this->taskUser->task->title.'.')
                    ->icon($this->taskUser->user->profile_photo_url)
                    ->dir(route('instructor.task.show',[$this->taskUser->task,$this->taskUser->user->id]));   
    }
}
