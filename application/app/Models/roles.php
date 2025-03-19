<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function permissions()
    {
        return $this->belongsToMany(Permissions::class, 'roles_permissions');
    }

    public function users()
    {
        return $this->belongsToMany(Users::class, 'users_roles');
    }
}
