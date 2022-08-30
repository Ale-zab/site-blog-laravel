<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\Tag;
use App\Observers\ArticleObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('common.column', function ($view) {
            $view->with('tags', Tag::all());
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Article::observe(ArticleObserver::class);

        Fortify::viewPrefix('auth.');

        \Blade::if('admin', function() {
            return Auth::user() ? Auth::user()->isAdmin() : false;
        });

        \Blade::directive('datetime', function($value) {
            return "<?php echo ($value)->format('H:i:s d.m.Y'); ?>";
        });
    }
}
