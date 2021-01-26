<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Galeri extends Model
{
    protected $touches  = ['user'];
    protected $fillable = ['img', 'title', 'slug'];

    // RELATION MANY  TO  ONE (USER)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // AUTHOR
    public function author()
    {
        if (Auth::check()) {
            return Auth::user()->id == $this->user_id;
        } else return false;
    }

    // MUTATOR
    public function getTakeImgAttribute()
    {
        return url('storage', $this->img);
    }
}
