<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return $guard === 'administrators' ?
                    redirect()->guest('admin/login') : redirect()->guest('login');
            }
        }

        if ($guard === 'administrators') {
            $modules = Auth::guard($guard)
                            ->user()
                            ->role()->getResults()
                            ->modules()->sortBy('position');

            view()->share('app_modules', $modules);
        }

        return $next($request);
    }
}
