<?php

namespace App\Models;

use App\Events\Article\ArticleDeleted;
use App\Events\Article\ArticleUpdated;
use App\Events\Article\ArticleCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'url', 'short_description', 'description', 'status', 'owner_id'];
    protected $guarded = ['_method', '_token'];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($article) {
            $after = $article->getDirty();
            $article->history()->attach(auth()->id(), [
                'before' => json_encode(Arr::only($article->fresh()->toArray(), array_keys($after))),
                'after' => json_encode($after),
            ]);
        });
    }

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function scopePublish($query)
    {
        return $query->where('status', 1)->latest();
    }

    public function get($url)
    {
        return self::where('url', '=', $url)->first();
    }

    public function history()
    {
        return $this->belongsToMany(User::class, 'article_histories')
            ->withPivot(['before', 'after'])
            ->withTimestamps();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')
            ->orderByDesc('created_at');
    }

    public function scopeLongest($query)
    {
        return $query->where('description', $query->max('description'))->first();
    }

    public function scopeShortest($query)
    {
        return $query->where('description', $query->min('description'))->first();
    }

    public function scopePopularArticle($builder)
    {
        return $builder->withCount('comments')->orderByDesc('comments_count')->first();
    }

    public function scopeMostInconsistentArticle($builder)
    {
        return $builder->withCount('history')->orderByDesc('history_count')->first();
    }
}
