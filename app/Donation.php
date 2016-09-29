<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    protected $table = 'donations';

    protected $fillable = ['date', 'amount', 'user_id'];

    /**
     * Get the donor that owns the donations.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
