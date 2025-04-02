<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorites extends Model
{
    use HasFactory;

    protected $fillable = ['user_id'];

    public function favoritable()
    {
        return $this->morphTo();
    }
}
