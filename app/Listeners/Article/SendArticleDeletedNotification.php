<?php

namespace App\Listeners\Article;

use App\Events\Article\ArticleDeleted;
use App\Notifications\Article;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendArticleDeletedNotification
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ArticleDeleted $event)
    {
        auth()->user()->notify(new Article($event->article, 'Статья удалена', false));
    }
}
