<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $local = ($request->hasHeader('Accept-Language') && in_array($request->header('Accept-Language'), ['ru', 'en', 'kz'])) ? $request->header('Accept-Language') : 'ru';
        app()->setLocale($local);
        return $next($request);
    }
}
