<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
// System Comment
use Laravelista\Comments\Commentable;
class Artikel extends Model
{
    use Commentable;
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

    // MUTATOR
    public function getTakeImgAttribute()
    {
        return url('storage', $this->img);
    }
}
