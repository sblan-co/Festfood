<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'street', 'number', 'postcode', 'floor', 'apartment'
    ];

    /**
     * Get the user that owns the address.
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
