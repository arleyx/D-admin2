<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the actions for the module.
     */
    public function actions () {
        return $this->belongsToMany('App\Action', 'permissions')->withTimestamps();
    }
}
