<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class films_compilations extends Model
{
    use HasFactory;

    protected $table = 'films_compilations';
    public $timestamps = false;

    protected $fillable = [
        'film_id',
        'compilation_id',
    ];
}
