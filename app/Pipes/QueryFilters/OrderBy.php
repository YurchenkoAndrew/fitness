<?php

namespace App\Pipes\QueryFilters;

use Closure;
use Illuminate\Contracts\Database\Eloquent\Builder;

/**
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
        if (request()->has('order_by_field') && request()->has('order_by_value')) {
            $query->orderBy(request('order_by_field'), request('order_by_value'));
        }

        return $next($query);
    }
}
