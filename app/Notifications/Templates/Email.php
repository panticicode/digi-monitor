<?php

namespace App\Notifications\Templates;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Email extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $template = $notifiable->templates()->first();
        $content = $template->content;
        $content = preg_replace("/USER_NAME/", $notifiable->name ?: '', $content);
        $content = preg_replace("/USER_EMAIL/", $notifiable->email ?: '', $content);
        $content = preg_replace("/USER_BIRTHDATE/", $notifiable->birth_date ?: '', $content);
        $content = preg_replace("/USER_PHONE/", $notifiable->phone ?: '', $content);
        $template->content = $content;
   
        return (new MailMessage)
                    ->subject($template->subject)
                    ->markdown(
                        'emails.birthdate', [
                            'user' => $notifiable,
                            'params' => $template->content
                        ]
                    );
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
            //
        ];
    }
}