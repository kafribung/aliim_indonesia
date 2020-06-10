<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $guarded = ['created_at', 'updated_at'];


    // Relation Many to Many (KategoriArtikel)
    public function kategori_artikels()
    {
        return $this->belongsToMany('App\Models\KategoriArtikel');
    }
}
