<?php

namespace App\Observers;

use App\Models\Article;
use App\Models\Role;
use App\Events\ArticleUpdated as ArticleUpdatedBroadcasting;
use App\Notifications\Article\ArticleCreated;
use App\Notifications\Article\ArticleDeleted;
use App\Notifications\Article\ArticleUpdated;
use App\Facades\PushallFacade;

class ArticleObserver
{
    /**
     * Handle the Article "created" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function created(Article $article)
    {
        PushallFacade::send($article->name, $article->description);
        Role::admins()->map->notify(new ArticleCreated($article));
    }

    /**
     * Handle the Article "updated" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function updated(Article $article)
    {
        Role::admins()->map->notify(new ArticleUpdated($article));
    }

    /**
     * Handle the Article "deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function deleted(Article $article)
    {
        Role::admins()->map->notify(new ArticleDeleted($article));
    }
}
