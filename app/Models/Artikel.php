<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
// System Comment
use Laravelista\Comments\Commentable;
class Artikel extends Model
{
    use Commentable;
    protected $fillable = ['title', 'description', 'img', 'slug', 'view'];

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

    // RELATION ONE TO MANY( NOTIFIKASI)
    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    // MUTATOR
    public function getTakeImgAttribute()
    {
        return url('storage', $this->img);
    }
}
