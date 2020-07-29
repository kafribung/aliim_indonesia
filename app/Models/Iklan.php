<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    protected $guarded = ['created_at', 'updated_at'];

    // Mutator
    public function getTakeImgAttribute()
    {
        return url('storage', $this->img);
    }
}
