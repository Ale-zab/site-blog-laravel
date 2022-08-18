<?php

namespace App\Notifications;

use App\Models\Article as ArticleModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Article extends Notification
{
    use Queueable;

    public $article;
    public $event;
    public $status;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ArticleModel $article, string $event, bool $status)
    {
        $this->article  = $article;
        $this->event    = $event;
        $this->status   = $status;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->view(
        'mail.article', ['article' => $this->article, 'event' => $this->event, 'status' => $this->status]
        );
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
