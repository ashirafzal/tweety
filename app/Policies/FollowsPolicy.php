<?php

namespace App\Policies;

use App\User;
use App\Follows;
use Illuminate\Auth\Access\HandlesAuthorization;

class FollowsPolicy
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

    public function view(User $user)
    {
        return true;
    }

    public function create(User $user)
    {
        return false;
    }

    public function update(User $user,Follows $follows)
    {
        return false;
    }

    public function delete(User $user,Follows $follows)
    {
        return false;
    }

    public function edit(User $user,Follows $follows)
    {
        return false;
    }

}