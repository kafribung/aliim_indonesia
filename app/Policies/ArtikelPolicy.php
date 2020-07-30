<?php

namespace App\Policies;

use App\Models\Artikel;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArtikelPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    public function edit(User $user, Artikel $artikel)
    {
        return $user->id == $artikel->user_id;
    }

    public function delete(User $user, Artikel $artikel)
    {
        return $user->id == $artikel->user_id;
    }
}
