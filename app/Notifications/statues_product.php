<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class statues_product extends Notification
{
    use Queueable;

    

    public function __construct(public $message)
    {


    }


    public function via(object $notifiable): array
    {
        return ['mail'];
    }


    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->mailer('smtp')
        ->greeting('Hello :'.$notifiable->name)
        ->line($this->message);


    }


    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
