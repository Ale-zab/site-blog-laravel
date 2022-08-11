<?php

namespace App\Models;


use App\Events\ArticleCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'url', 'short_description', 'description', 'status', 'owner_id'];
    protected $guarded = ['_method', '_token'];
//    protected $dispatchesEvents = [
//        'created' => ArticleCreated::class,
//    ];

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

    public function owner()
    {
        return $this->belongsTo(User::class);
    }
}
