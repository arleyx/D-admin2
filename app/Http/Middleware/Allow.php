<?php

namespace App\Http\Middleware;

use Closure;

use App\Module;
use App\Action;

class Allow
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $module_name = '', $action_name = '')
    {
        if (!isset($request->dataConfig)) $request->dataConfig = [];

        if ($module_name === 'dashboard') {
            $request->dataConfig['module'] = new Module;
            $request->dataConfig['module']->id = 0;
            $request->dataConfig['module']->name = 'dashboard';
        } else {
            $request->dataConfig['module'] = Module::where('name', $module_name)->first();
            $request->dataConfig['action'] = Action::where('name', $action_name)->first();
        }
        return $next($request);
    }
}
