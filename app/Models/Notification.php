<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    // Mass Assigment
    protected $guarded = [
        'id',
        'created_at',
        'upated_at'
    ];

    // RELATION MANY TO ONE( USER)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    // RELATION MANY TO ONE( USER)
    public function artikel()
    {
        return $this->belongsTo('App\Models\Artikel');
    }
}
