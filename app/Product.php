<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['ar_name', 'ar_small_description', 'ar_description',
                            'en_name', 'en_small_description', 'en_description',
                            'quantity', 'price_after_sale', 'price', 'sku', 'slug',
                            'main_image', 'images', 'meta', 'category_id',
                            'is_active', 'is_composite'];

    public function getFormatedPrice () {
        return $this->price . ' SR';
    }
    
    public function getFormatedSale () {
        return $this->price . ' SR';
    }

    // START PRODUCT CATEGORIES PHASE
    public function categories () {
        return $this->belongsToMany(ProductCategory::class, 'r_category_products', 'product_id', 'category_id');
    }

    // START COMPOSITE PRODUCT PHASE
    public function children () {
        return $this->belongsToMany(Product::class, 'composite_product_products', 'composite_product_id', 'product_id'); 
    }
    
    public function parent () {
        return $this->belongsToMany(Product::class, 'composite_product_products', 'product_id', 'composite_product_id'); 
    }

    // START ORDERS PHASE
    public function product_orders () {
        return $this->hasMany(OrderProduct::class, 'product_id');
    }

    public function orders () {
        return $this->belongsToMany(Order::class, 'order_products', 'product_id', 'order_id');
    }
}
