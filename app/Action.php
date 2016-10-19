<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the modules for the actions.
     */
    public function modules () {
        return $this->belongsToMany('App\Module', 'permissions')->withTimestamps();
    }
}
