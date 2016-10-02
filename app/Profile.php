<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = ['name'];

    public function administrators () {
        return $this->hasMany('App\Administrator');
    }

    public function modules () {
        return $this->belongsToMany('App\Module')->withTimestamps();
    }
}
