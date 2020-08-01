<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KomentArtikel extends Model
{
    protected $touches = ['user', 'artikel'];
    protected $fillable = ['description', 'artikel_id'];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function artikel()
    {
        return $this->belongsTo('App\Models\Artikel');
    }
}
