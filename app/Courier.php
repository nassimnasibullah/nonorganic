<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    public function order()
    {
        return $this->hasMany(Order::class, 'courier_id');
    }
}
