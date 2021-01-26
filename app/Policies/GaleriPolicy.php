<?php

namespace App\Policies;

use App\Models\Galeri;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GaleriPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function author(User $user, Galeri $galeri)
    {
        return $user->id == $galeri->user_id;
    }
}
