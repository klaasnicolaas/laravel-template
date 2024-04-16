<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('user-read');
    }

    /**
     * Determine whether the user can view the model.
     */
    // public function view(User $user, User $model): bool
    // {
    //     return $user->hasPermissionTo('user-read');
    // }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('user-create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return $user->hasPermissionTo('user-update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return $user->hasPermissionTo('user-delete');
    }

    /**
     * Determine whether the user can delete multiple models.
     */
    public function deleteAny(User $user): bool
    {
        return $user->hasPermissionTo('user-delete');
    }

    /**
     * Determine whether the user can restore the model.
     */
    // public function restore(User $user, User $model): bool
    // {
    //     return false;
    // }

    /**
     * Determine whether the user can permanently delete the model.
     */
    // public function forceDelete(User $user, User $model): bool
    // {
    //     return false;
    // }

    /**
     * Determine whether the user can permanently delete any models.
     */
    // public function forceDeleteAny(User $user, User $model): bool
    // {
    //     return $user->hasPermissionTo('user-delete');
    // }

    /**
     * Determine whether a user can suspend another user.
     */
    // public function suspend(User $user): bool
    // {
    //     return $user->hasPermissionTo('user-delete');
    // }
}
