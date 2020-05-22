<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Relación con los Pedidos

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

}
