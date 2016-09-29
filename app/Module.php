<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';

    protected $fillable = ['name'];

    public function profiles () {
        return $this->belongsToMany('App\Profile')->withTimestamps();
    }

    public function actions () {
        return $this->belongsToMany('App\Action')->withTimestamps();
    }
}
