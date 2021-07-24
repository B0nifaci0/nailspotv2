<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\WebPush\WebPushMessage;
use NotificationChannels\WebPush\WebPushChannel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TasksCompleted extends Notification
{
    use Queueable;
    public $user, $task;
    public function __construct($user, $task){
        $this->user=$user;
        $this->task=$task;
    }

    public function via($notifiable){
        return [WebPushChannel::class];
    }

    public function toWebPush($notifiable){
        return (new WebPushMessage)
                    ->title('¡Tarea Entregada!')
                    ->icon('img/nail.png')
                    ->body('El alumno '.$this->user->name.' entrego la tarea '.$this->task->title);

    }
}
