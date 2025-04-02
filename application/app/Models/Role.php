<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function permissions()
    {
        return $this->belongsToMany(permissions::class, 'roles_permissions');
    }

    public function users()
    {
        return $this->belongsToMany(users::class, 'users_roles');
    }
}
