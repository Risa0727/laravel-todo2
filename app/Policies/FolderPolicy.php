<?php

namespace App\Policies;

use App\Models\Folder;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FolderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     * フォルダの閲覧権限
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Folder $folder)
    {
      if ($user->name === 'admin') {
        return true;
      }
      return $user->id === $folder->user_id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Folder $folder)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Folder $folder)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Folder $folder)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Folder  $folder
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Folder $folder)
    {
        //
    }
}
