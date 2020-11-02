<?php

namespace App\Policies;

use App\User;
use App\Likes;
use Illuminate\Auth\Access\HandlesAuthorization;

class LikesPolicy
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

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user,Likes $likes)
    {
        return $likes->user_id === $user->id;;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user)
    {
        return false;
    }

    public function delete(User $user)
    {
        return false;
    }

    public function edit(User $user,Likes $tweet)
    {
        return false;
    }

}