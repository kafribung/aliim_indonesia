<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Video extends Model
{
    protected $touhches = ['user'];
    protected $fillable = ['title', 'description', 'video', 'slug'];

    // RELATION MANY TO ONE (USER)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // RELATION MANY to MANY (KategoriVideo)
    public function kategori_videos()
    {
        return $this->belongsToMany('App\Models\KategoriVideo');
    }

    // AUTHOR
    public function author()
    {
        if (Auth::check()) {
            return Auth::user()->id == $this->user_id;
        } else return false;
    }
}
