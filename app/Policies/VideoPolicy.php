<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Video;
use Illuminate\Auth\Access\HandlesAuthorization;

class VideoPolicy
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

    public function edit(User $user, Video $video)
    {
        return $user->id == $video->user_id;
    }

    public function delete(User $user, Video $video)
    {
        return $user->id == $video->user_id;
    }
}