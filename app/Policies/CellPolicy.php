<?php

namespace App\Policies;

use App\Models\Cell;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

class CellPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cell  $cell
     * @return mixed
     */
    public function view(User $user, Cell $cell)
    {
        return $user->id == $cell->user_id;
    } // view.

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cell  $cell
     * @return mixed
     */
    public function update(User $user, Cell $cell)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cell  $cell
     * @return mixed
     */
    public function delete(User $user, Cell $cell)
    {
        return $user->id == $cell->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cell  $cell
     * @return mixed
     */
    public function restore(User $user, Cell $cell)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Cell  $cell
     * @return mixed
     */
    public function forceDelete(User $user, Cell $cell)
    {
        //
    }
}
