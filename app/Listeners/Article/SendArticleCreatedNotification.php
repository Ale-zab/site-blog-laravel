<?php

namespace App\Listeners\Article;

use App\Events\Article\ArticleCreated;
use App\Notifications\Article;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendArticleCreatedNotification
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(ArticleCreated $event)
    {
         auth()->user()->notify(new Article($event->article, 'Статья создана', true));
    }
}
