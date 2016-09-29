<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $table = 'actions';

    protected $fillable = ['name'];

    public function modules () {
        return $this->belongsToMany('App\Module')->withTimestamps();
    }
}
