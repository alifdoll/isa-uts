<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;

class UserPolicy
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

    public function isAdmin(User $user)
    {
        return $user->roles == "administrator" || $user->roles == "staff";
           
    }

    public function isNotSuspended(User $user)
    {
        return $user->suspend == "unsuspend"
            ? Response::allow("not banned")
            : Response::deny("Your Account Have Been Suspended");
    }
}
