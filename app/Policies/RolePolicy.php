<?php

namespace App\Policies;

use App\Contracts\Constants\Permissions;
use App\Helpers\Interfaces\ICheckingPermissionsForRole;
use App\Models\RoleAndPermission\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class RolePolicy
{
    use HandlesAuthorization;

    private ICheckingPermissionsForRole $checkingPermissionsForRole;

    public function __construct(ICheckingPermissionsForRole $checkingPermissionsForRole)
    {
        $this->checkingPermissionsForRole = $checkingPermissionsForRole;
    }

    /**
     * Perform pre-authorization checks.
     *
     * @param User $user
     * @return void|bool
     */
    public function before(User $user)
    {
        if ($user->email === env('EMAIL_SUPER_ADMIN')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function viewAny(User $user): Response|bool
    {
        return $this->checkingPermissionsForRole->isPermission($user->role_id, Permissions::VIEWING_THE_LIST_OF_ROLES);
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param User $user
     * @return Response|bool
     */
    public function view(User $user): Response|bool
    {
        return $this->checkingPermissionsForRole->isPermission($user->role_id, Permissions::VIEW_ROLES);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param User $user
     * @return Response|bool
     */
    public function create(User $user): Response|bool
    {
        return $this->checkingPermissionsForRole->isPermission($user->role_id, Permissions::CREATING_ROLES);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param User $user
     * @return Response|bool
     */
    public function update(User $user): Response|bool
    {
        return $this->checkingPermissionsForRole->isPermission($user->role_id, Permissions::EDITING_ROLES);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param User $user
     * @return Response|bool
     */
    public function delete(User $user): Response|bool
    {
        return $this->checkingPermissionsForRole->isPermission($user->role_id, Permissions::REMOVING_ROLES);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param User $user
     * @param Role $role
     * @return Response|bool
     */
//    public function restore(User $user, Role $role): Response|bool
//    {
//        return true;
//    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @param Role $role
     * @return Response|bool
     */
//    public function forceDelete(User $user, Role $role): Response|bool
//    {
//        return true;
//    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @return Response|bool
     */
    public function setPermission(User $user): Response|bool
    {
        return $this->checkingPermissionsForRole->isPermission($user->role_id, Permissions::SET_PERMISSION);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param User $user
     * @return Response|bool
     */
    public function deletePermission(User $user): Response|bool
    {
        return $this->checkingPermissionsForRole->isPermission($user->role_id, Permissions::REMOVING_PERMISSIONS);
    }
}
