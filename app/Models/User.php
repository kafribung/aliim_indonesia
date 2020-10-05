<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['created_at', 'updated_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ROUTE KEY NAME
    public function getRouteKeyName()
    {
        return 'email';
    }

    // RELATION ONE TO MANY (ARTIKEL)
    public function artikels()
    {
        return $this->hasMany('App\Models\Artikel');
    }

    // RELATION ONE TO MANY (VIDEO)
    public function videos()
    {
        return $this->hasMany('App\Models\Video');
    }

    // RELATION ONE TO MANY (DOA & HADIST)
    public function doa_hadists()
    {
        return $this->hasMany('App\Models\DoaHadist');
    }

    // RELATION ONE TO MANY( KOMENTAR ARTIKEL)
    public function komentars()
    {
        return $this->hasMany('App\Models\KomentArtikel');
    }

    // KING
    public function king()
    {
        return $this->email == 'admin@aliim.com';
    }

    //MUTATOR
    public function gettakeImgAttribute()
    {
        return url('storage', $this->img);
    }
}
