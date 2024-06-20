<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewUser extends Notification
{
    use Queueable;

    public $user;

    /**
     * Create a new notification instance.
     */
    public function __construct($user)
    {
        $user = $this->$user;
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        return [
            //
            'name' =>$this->$user->name,
            'email' =>$this->$user->email,
            'message' =>"New user has registered to the forum",
            'type' =>'new_user',
            // 'new_user' => 1,
        ];
    }
}
