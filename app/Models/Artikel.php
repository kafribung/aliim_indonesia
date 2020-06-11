<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Artikel extends Model
{
    protected $touhches= ['user'];
    protected $guarded = ['created_at', 'updated_at'];

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

    // AUTHOR
    public function author()
    {
        if(Auth::check()){
            return Auth::user()->id == $this->user_id;
        } else return false;
    }

    // MUTATOR
    public function getImgAttribute($value)
    {
        return url('img_artikels', $value);
    }


}
