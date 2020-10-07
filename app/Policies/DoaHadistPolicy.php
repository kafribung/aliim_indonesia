<?php

namespace App\Policies;

use App\Models\DoaHadist;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DoaHadistPolicy
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

    public function author(User $user, DoaHadist $doaHadist)
    {
        return $user->id == $doaHadist->user_id;
    }
}
