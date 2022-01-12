<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['status', 'note', 'meta', 'sub_total', 'total', 'customer_id', 'code'];

    public function customer () {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function order_products () {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }

    public function products () {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')->withPivot('price_when_order');
    }
}
