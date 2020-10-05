<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Artikel extends Model
{
    protected $touhches = ['user'];
    protected $fillable = ['title', 'description', 'img', 'slug'];

    // ROUTE KEY NAME
    public function getRouteKeyName()
    {
        return 'slug';
    }

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

    // MUTATOR
    public function getTakeImgAttribute()
    {
        return url('storage', $this->img);
    }
}
