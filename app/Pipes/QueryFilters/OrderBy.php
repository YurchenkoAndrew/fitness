<?php

namespace App\Pipes\QueryFilters;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;

/**
 * localhost/posts?order_by_field=name&order_by_value=DESC
 *
 */
class OrderBy
{
    /**
     * @param Builder $query
     * @param Closure $next
     * @return mixed
     */
    public function handle(Builder $query, Closure $next): mixed
    {
        if (request()->has('sort_by_field') && request()->has('sort_direction')) {
            $query->orderBy(request('sort_by_field'), request('sort_direction'));
        }
        if (request()->has('sort_by_field')) {
            $query->orderBy(request('sort_by_field'), 'ASC');
        }

        return $next($query);
    }
}
