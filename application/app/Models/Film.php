<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'genre_id',
        'description',
        'released_at',
        'rating',
        'poster',
    ];

    public function genre()
    {
        return $this->belongsTo(genres::class);
    }

    public function genres()
    {
        return $this->belongsToMany(genres::class, 'films_genres');
    }

    public function compilations()
    {
        return $this->belongsToMany(compilations::class, 'films_compilations');
    }

    public function favorites()
    {
        return $this->morphMany(favorites::class, 'favoritable');
    }

    public function actors()
    {
        return $this->belongsToMany(actors::class, 'films_actors');
    }

    public function directors()
    {
        return $this->belongsToMany(directors::class, 'films_directors');
    }

    public function files()
    {
        return $this->morphMany(files::class, 'fileable');
    }
}
