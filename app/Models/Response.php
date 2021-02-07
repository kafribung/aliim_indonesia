<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    // Mass Assigment
    protected $fillable = [
        'description'
    ];
    
    // RELATION MANY TO ONE( USER)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
