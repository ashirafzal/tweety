<?php

namespace App\Policies;

use App\User;
use App\Tweet;
use Illuminate\Auth\Access\HandlesAuthorization;

class TweetPolicy
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
        return true;
    }

    public function update(User $user,Tweet $tweet)
    {
        return $tweet->user_id === $user->id;
    }

    public function delete(User $user,Tweet $tweet)
    {
        return $tweet->user_id === $user->id;
    }

    public function edit(User $user,Tweet $tweet)
    {
        return $tweet->user_id === $user->id;
    }
}