<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'create_at'];

    /**
     * Get the administrators for the system.
     */
    public function administrators () {
        return $this->hasMany('App\Administrator');
    }

    /**
     * Get the permissions for the role.
     */
    public function permissions()
    {
        return $this->belongsToMany('App\Permission');
    }

    /**
     * Get the modules for the role.
     */
    public function modules()
    {
        $modules = collect();
        $permissions = $this->belongsToMany('App\Permission')->groupBy('module_id')->getResults();
        foreach ($permissions as $permission) $modules->push($permission->module());

        return $modules;
    }
}
