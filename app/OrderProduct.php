<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = ['order_id', 'product_id', 'ar_name', 'en_name', 'sku', 'code', 'price_when_order', 'status'];

    public function product () {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function order () {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
