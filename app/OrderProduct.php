<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = ['order_id', 'product_id', 'ar_name', 'en_name', 'sku', 'code', 'price_when_order', 'status', 'is_child', 'parent_product_id'];

    protected $with = [];
    
    public function product () {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function order () {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function categories () {
        return $this->belongsToMany(ProductCategory::class, 'r_category_products', 'product_id', 'category_id', 'product_id');
    }

    public function status () {
        return $this->belongsTo(OrderStatus::class, 'status', 'status_code');
    }

    public function parentProduct () {
        return $this->belongsTo(OrderProduct::class, 'parent_product_id', 'product_id');
    }
    
    public function childrenProducts () {
        return $this->hasMany(OrderProduct::class, 'parent_product_id', 'product_id');
    }
}
