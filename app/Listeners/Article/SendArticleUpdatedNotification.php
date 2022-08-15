<?php

namespace App\Listeners\Article;

use App\Events\Article\ArticleUpdated;
use App\Notifications\Article;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendArticleUpdatedNotification
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ArticleUpdated $event)
    {
       auth()->user()->notify(new Article($event->article, 'Статья обновлена', true));
    }
}
