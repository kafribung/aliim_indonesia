<?php

namespace App\Policies;

use App\Models\User;
use App\Models\KomentArtikel;
use Illuminate\Auth\Access\HandlesAuthorization;

class KomentArtikelPolicy
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
    public function edit(User $user, KomentArtikel $komentArtikel)
    {
        return $user->id == $komentArtikel->user_id;
    }

    public function delete(User $user, KomentArtikel $komentArtikel)
    {
        return $user->id == $komentArtikel->user_id;
    }
}
