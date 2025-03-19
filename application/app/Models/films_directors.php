<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class films_directors extends Model
{
    use HasFactory;

    protected $table = 'films_directors';
    public $timestamps = false;

    protected $fillable = [
        'film_id',
        'director_id',
    ];
}
