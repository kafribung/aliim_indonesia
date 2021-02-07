<?php

namespace App\Models;

use Chatify\Http\Models\Message;
use Laravelista\Comments\Commenter;
use Illuminate\Notifications\Notifiable;
// System Comment
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable, Commenter;

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

    // RELATION ONE TO MANY (DOA & HADIST)
    public function galeries()
    {
        return $this->hasMany('App\Models\Galeri');
    }

    // RELATION ONE TO MANY( KOMENTAR ARTIKEL)
    public function komentars()
    {
        return $this->hasMany('App\Models\KomentArtikel');
    }

    // RELATION ONE TO MANY( TANGGAPAN)
    public function responses()
    {
        return $this->hasMany('App\Models\Response');
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

    // Message
    public function countUnseenMessages(){
        // get all users that received/sent message from/to [Auth user]
        $users = Message::join('users',  function ($join) {
            $join->on('messages.from_id', '=', 'users.id')
                ->orOn('messages.to_id', '=', 'users.id');
        })
            ->where('messages.from_id', Auth::user()->id)
            ->orWhere('messages.to_id', Auth::user()->id)
            ->orderBy('messages.created_at', 'desc')
            ->get()
            ->unique('id');

        if ($users->count() > 0) {
            // fetch contacts
            $contacts = null;
            foreach ($users as $user) {
                if ($user->id != Auth::user()->id) {
                    // Get user data
                    $userCollection = User::where('id', $user->id)->first();
                    return Message::where('from_id', $userCollection->id)->where('to_id',Auth::user()->id)->where('seen',0)->count();
                }
            }
        }
    }
}
