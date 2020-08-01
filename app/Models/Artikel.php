<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Artikel extends Model
{
    protected $touhches = ['user'];
    protected $fillable = ['title', 'description', 'img', 'slug'];

    // RELATION MANY TO ONE (USER)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // Relation Many to Many (KategoriArtikel)
    public function kategori_artikels()
    {
        return $this->belongsToMany('App\Models\KategoriArtikel');
    }

    // Relation One to Many (Komentar)
    public function komentars()
    {
        return $this->hasMany('App\Models\KomentArtikel');
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
