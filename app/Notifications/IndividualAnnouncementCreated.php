<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class IndividualAnnouncementCreated extends Notification
{
    use Queueable;
    private $announcement;
    private $notes;


    /**
     * Create a new notification instance.
     */
    public function __construct($announcement, $notes)
    {
        $this->announcement = $announcement;
        $this->notes = $notes;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(User $notifiable): MailMessage
    {
        $greeting='Hello,';
        $message ='Important!!';
        return (new MailMessage)
                   ->greeting($greeting)
                    ->subject($message)
                    ->line('Individual Email Content:')
                    ->line($this->notes)
                    ->line('Thank you!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
