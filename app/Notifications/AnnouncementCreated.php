<?php

namespace App\Notifications;

use App\Models\User;
use App\Models\Announcement;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AnnouncementCreated extends Notification
{
    use Queueable;

    private Announcement $announcement;
    private ?string $notes;

    /**
     * Create a new notification instance.
     */
    public function __construct(Announcement $announcement,?string $notes = null)
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
        $message ='Event Updates .';
        $recipientEmail = $notifiable->email;
        
        $mailMessage = (new MailMessage)
                    ->greeting($greeting)
                    ->subject($message)
                    ->line('An additional note about the event.');
                    // ->action('Notification Action', url('/'))
                    // ->to($recipientEmail)
                    
                    if ($this->notes) {
                        $mailMessage->line('Additional Notes:')
                            ->line($this->notes);
                    };
            

                    $mailMessage->line('Thank you !');

        return $mailMessage;
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
