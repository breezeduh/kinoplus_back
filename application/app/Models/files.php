<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class files extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_url',
        'file_extension',
    ];

    public function fileable()
    {
        return $this->morphTo();
    }
}
