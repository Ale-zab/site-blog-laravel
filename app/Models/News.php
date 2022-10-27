<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $guarded = ['checkbox'];
    protected  $primaryKey = 'url';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::created(function () {
            \Cache::tags(['news'])->flush();
        });

        static::updated(function () {
            \Cache::tags(['news'])->flush();
        });

        static::deleted(function () {
            \Cache::tags(['news'])->flush();
        });
    }

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function scopePublish($query)
    {
        return $query->where('status', 1)->latest();
    }

    public function get($url)
    {
        return self::where('url', '=', $url)->first();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')
            ->orderByDesc('created_at');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
