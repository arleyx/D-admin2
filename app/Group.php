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
    public function donors()
    {
        return $this->hasMany('App\Donor');
    }

    /**
     * Get the beering record associated with the group.
     */
    public function beering()
    {
        return $this->hasOne('App\Beering');
    }
}
