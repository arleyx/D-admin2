<?php

namespace App\Providers;

use App\Permission;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);

        foreach ($this->getPermissions() as $permission) {
            $gate->define($permission->action()->name.'-'.$permission->module()->name, function($administrator, $module, $action) {
                return $administrator->role()->getResults()
                                     ->permissions()
                                     ->where('module_id', $module->id)
                                     ->where('action_id', $action->id)->count() > 0;
            });
        }
    }

    /**
     * Get permissions for system.
     *
     * @return Collection
     */
    public function getPermissions()
    {
        return Permission::all();
    }
}
