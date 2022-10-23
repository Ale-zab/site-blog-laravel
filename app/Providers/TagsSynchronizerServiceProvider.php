<?php

namespace App\Providers;

use App\Services\TagsSynchronizer;
use Illuminate\Support\ServiceProvider;

class TagsSynchronizerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(TagsSynchronizer::class, function() {
            return new TagsSynchronizer();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot() {}
}
