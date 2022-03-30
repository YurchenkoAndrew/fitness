<?php

namespace App\Pipes\QueryFilters;

use App\Models\RoleAndPermission\Role;
use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;

/**
 * На вход подаётся строковое значение роли - поле slug
 *После, находится такая роль и её ID
 *И выбираются пользователи с этим ROLE_ID
 *
 */
class SelectByRole
{
    /**
     * @param Builder $query
     * @param Closure $next
     * @return mixed
     */
    public function handle(Builder $query, Closure $next): mixed
    {
        if (request()->has('role')) {
            $role = Role::query()->where('slug', request('role'))->first();
            /** @var Role $role */
            $query->where('role_id', $role->id);
        }

        return $next($query);
    }
}
