<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permissions extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'roles_permissions');
    }
}
