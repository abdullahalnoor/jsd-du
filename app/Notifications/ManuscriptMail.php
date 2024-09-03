<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ManuscriptMail extends Notification
{
    use Queueable;

    public $mailMessages = [];

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mailMessages)
    {
        $this->mailMessages = $mailMessages;
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
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
        ->cc($this->mailMessages['send_to'])
        ->bcc($this->mailMessages['send_to'])
        // ->bcc($notifiable->profile->contact_email)
        ->subject($this->mailMessages['subject']) 
        ->action($this->mailMessages['action_text'], $this->mailMessages['home_url'])
        // ->markdown('frontend.emails.general-mail', ['url' => $this->mailMessages['action_url'],'mail_body' => $this->mailMessages['mail_body'], 'user' => $notifiable]);
        ->markdown($this->mailMessages['markdown'], ['url' => $this->mailMessages['action_url'],'mail_body' => $this->mailMessages['mail_body'],'name' => $this->mailMessages['name'], 'user' => $notifiable]);

        // return (new MailMessage)->markdown('mail.manuscript-mail');
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
