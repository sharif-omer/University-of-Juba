<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;
use Illuminate\Notifications\Notification;

class GeneralNotification extends Notification
{
    public function via($notifiable)
    {
        return ['database'];
    }

        use Queueable;

        protected $title;
        protected $message;
        
        public function __construct($title, $message) 
    
        {
            $this->title = $title;
            $this->message = $message;
        }

        public function toDatabase($notifiable)
        {
            return [
              'title' => $this->title,
              'message' => $this->message,

            ];
        }
    }