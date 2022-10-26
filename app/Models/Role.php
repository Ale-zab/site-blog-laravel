<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    public static function admins()
    {
        return self::getRole('admin')->belongsToMany(User::class, 'user_role')->get();
    }

    public static function getRole($prefix)
    {
        return self::where('prefix', $prefix)->first();
    }
}
