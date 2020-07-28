<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriVideo extends Model
{
    protected $fillable = ['title'];

    // RELATION MANY to MANY (KategoriVideo)
    public function videos()
    {
        return $this->belongsToMany('App\Models\Video');
    }
}
