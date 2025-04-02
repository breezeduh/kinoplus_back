<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'awards',
        'slug',
    ];

    public function films()
    {
        return $this->belongsToMany(films::class, 'films_directors');
    }

    public function files()
    {
        return $this->morphMany(files::class, 'fileable');
    }
}
