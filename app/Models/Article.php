<?php

namespace App\Models;

use App\Notifications\Article as ArticleNotifications;
use App\Events\ArticleCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'url', 'short_description', 'description', 'status', 'owner_id'];
    protected $guarded = ['_method', '_token'];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($article) {
            auth()->user()->notify(new ArticleNotifications($article, 'Статья создана', true));
        });

        static::updated(function ($article) {
            auth()->user()->notify(new ArticleNotifications($article, 'Статья обновлена', true));
        });


        static::deleted(function ($article) {
            auth()->user()->notify(new ArticleNotifications($article, 'Статья удалена', false));
        });
    }

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_article');
    }

    public function scopePublish($query)
    {
        return $query->where('status', 1)->latest()->get();
    }

    public function get($url)
    {
        return self::where('url', '=', $url)->first();
    }
}
