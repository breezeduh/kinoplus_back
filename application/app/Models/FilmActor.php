<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilmActor extends Model
{
    use HasFactory;

    protected $table = 'films_actors';
    public $timestamps = false;

    protected $fillable = [
        'film_id',
        'actor_id',
    ];
}
