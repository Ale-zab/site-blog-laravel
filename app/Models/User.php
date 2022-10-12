<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class, 'user_role');
    }

    public function isAdmin() {
        return $this->roles()->where('prefix', 'admin')->exists();
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'owner_id');
    }

    public function scopeMostActiveAuthor($builder)
    {
        return $builder->withCount('articles')->orderByDesc('articles_count')->get('name','id')->first();
    }

    public function scopeAverageNumberOfArticles($builder)
    {
        return $builder->has('articles')->withCount('articles')->get()->avg('articles_count');
    }
}
