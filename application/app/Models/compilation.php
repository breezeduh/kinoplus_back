<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compilation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function films()
    {
        return $this->belongsToMany(films::class, 'films_compilations');
    }
}
