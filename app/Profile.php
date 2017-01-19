<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'email',
        'phone',
        'occupation',
        'about_you',
        'citizenship',
        'country',
        'know_us',
        'update_at',
        'create_at'
    ];

    /**
     * Get the administrators for the system.
     */
    public function user () {
        return $this->hasOne('App\User');
    }
}
