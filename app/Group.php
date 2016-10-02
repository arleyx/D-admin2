<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';

    protected $fillable = ['name', 'beering_id'];

    /**
     * Get the comments for the blog post.
     */
    public function users()
    {
        return $this->hasMany('App\User');
    }

    /**
     * Get the beering record associated with the group.
     */
    public function beering()
    {
        return $this->hasOne('App\Beering');
    }
}
