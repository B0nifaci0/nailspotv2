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
    public function toArray($notifiable){
        return[
            'title'=>'¡Tarea Entregada!',
            'body'=>'El alumno '.$this->user->name.' entregó la tarea '.$this->task->title,
            'action_url'=>route('instructor.task.show',[$this->task,$this->user]),
        ];
    }

    public function via($notifiable){
        return ['database',WebPushChannel::class];
    }

    public function toWebPush($notifiable, $notification){
        return (new WebPushMessage)
                    ->title('¡Tarea Entregada!')
                    ->body('El alumno '.$this->user->name.' entregó la tarea '.$this->task->title)
                    ->action('View_app', 'view_app')
                    ->data(['id' => $notification->id]);
    }
}