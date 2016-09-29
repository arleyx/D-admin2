<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = ['name'];

    public function users () {
        return $this->hasMany('App\User');
    }

    public function modules () {
        return $this->belongsToMany('App\Module')->withTimestamps();
    }
}
