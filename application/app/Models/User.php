<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\user as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'username',
        'email',
        'password',
        'first_name',
        'last_name',
        'registered_at',
    ];

    public function roles()
    {
        return $this->belongsToMany(roles::class, 'users_roles');
    }

    public function favorites()
    {
        return $this->morphMany(favorites::class, 'favoritable');
    }
}
