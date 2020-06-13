<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriVideo extends Model
{
    protected $guarded = ['created_at', 'updated_at'];
    
    // RELATION MANY to MANY (KategoriVideo)
    public function videos()
    {
        return $this->belongsToMany('App\Models\Video');
    }
}
