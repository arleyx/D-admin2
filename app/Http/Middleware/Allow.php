<?php

namespace App\Http\Middleware;

use Gate;
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
        if ($module_name === 'init' && $action_name === 'show') {
            $module = new Module;
            $module->id = 0;
            $module->name = 'init';

            view()->share('app_module', $module);
        } else {
            $module = Module::where('name', $module_name)->first();
            $action = Action::where('name', $action_name)->first();

            if ($request->user('administrators')->cannot($action_name.'-'.$module_name, [$module, $action]))
                abort(403);

            view()->share('app_module', $module);
            view()->share('app_action', $action);
        }

        return $next($request);
    }
}
