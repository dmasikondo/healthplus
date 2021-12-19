<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserWasSuspended extends Notification
{
    use Queueable;
    public $user;
    public $adminFirstName;
    public $adminSurname;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $adminFirstName, $adminSurname)
    {
        $this->user = $user;
        $this->adminFirstName = $adminFirstName;
        $this->adminSurname = $adminSurname;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user' =>$this->user,
            'icon' => 'ban',
            'message' => 'had account suspension status changed by '.$this->adminFirstName.' '.$this->adminSurname,
            'url' =>'/users/'.$this->user->slug,
        ];
    }
}
