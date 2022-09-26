<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $guarded = ['checkbox'];

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
}
