<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriArtikel extends Model
{
    protected $fillable = ['title'];

    // Relation Many to Many (Artikel)
    public function artikels()
    {
        return $this->belongsToMany('App\Models\Artikel');
    }
}
