<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }
}
