<?php

namespace App\Policies;

use App\Models\API\V1\Property;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropertyPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->isGranted(User::isSuperadmin)) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->isGranted(User::isGuest);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\API\V1\Property  $property
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Property $property)
    {
        return $user->isGranted(User::isGuest);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->isGranted(User::isHost);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\API\V1\Property  $property
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Property $PropertyId)
    {
        if($user->isGranted(User::isHost) && $user->id == $PropertyId->user_id){
            return true;
        }else {
            return false;
        }
        // return $user->id === $PropertyId->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\API\V1\Property  $property
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Property $PropertyId)
    {
        if($user->isGranted(User::isHost) && $user->id == $PropertyId->user_id){
            return true;
        }else {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\API\V1\Property  $property
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Property $property)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\API\V1\Property  $property
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Property $property)
    {
        //
    }
}
