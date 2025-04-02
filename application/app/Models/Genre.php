<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function films()
    {
        return $this->hasMany(films::class);
    }

    public function filmsMany()
    {
        return $this->belongsToMany(films::class, 'films_genres');
    }
}
