<?php

namespace App\Providers;

use App\Events\Article\ArticleCreated;
use App\Events\Article\ArticleDeleted;
use App\Events\Article\ArticleUpdated;
use App\Listeners\Article\SendArticleCreatedNotification;
use App\Listeners\Article\SendArticleDeletedNotification;
use App\Listeners\Article\SendArticleUpdatedNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        ArticleCreated::class => [
            SendArticleCreatedNotification::class,
        ],
        ArticleUpdated::class => [
            SendArticleUpdatedNotification::class,
        ],
        ArticleDeleted::class => [
            SendArticleDeletedNotification::class,
        ],
    ];

    public function boot()
    {
    }
}
