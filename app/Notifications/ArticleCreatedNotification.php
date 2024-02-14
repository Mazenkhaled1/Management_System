<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ArticleCreatedNotification extends Notification
{
    use Queueable;

      /**
     * Create a new notification instance.
     */
    public $articleData;
    public function __construct($articleData)
    {
        $this->articleData = $articleData;
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
                    ->subject('Congratilations you have created post successfuly')
                    ->greeting('Welcome Ya zo2')
                    ->line('The Article name is '.$this->articleData->name)
                    ->line('Thank you for using Mazen App!')
                    ->action('See my FB Page',('www.facebook.com'));
    }

}
