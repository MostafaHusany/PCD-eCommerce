<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['ar_name', 'ar_small_description', 'ar_description',
                            'en_name', 'en_small_description', 'en_description',
                            'quantity', 'reserved_quantity', 'price_after_sale', 'price', 'sku', 'slug',
                            'main_image', 'images', 'meta', 'category_id',
                            'is_active', 'is_composite', 'brand_id'];

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

    public function product_custome_fields () {
        return $this->hasMany(ProductCustomeField::class, 'product_id');
    }

    public function brand () {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function promotions () {
        return $this->belongsToMany(Promotion::class, 'product_promotions', 'product_id', 'promotion_id')->withPivot(['start_date', 'end_date', 'quantity', 'is_active']);;
    }

    public function product_promotion_r () {
        return $this->hasMany(ProductPromotion::class, 'product_id');
    }

    public function has_promotion () {
        // check if the product has an active promotion
        return $this->promotions()->where('promotions.is_active', 1)->count();
    }

    public function get_promotion () {
        // get lates promotion of the product
        return $this->product_promotion_r()
         ->where('product_promotions.start_date', '<=', Date('Y-m-d'))
        //  ->where('product_promotions.end_date', '>=', Date('Y-m-d'))
         ->where('product_promotions.is_active', 1)
        ->where('product_promotions.quantity', '>', 0)
        ->orderBy('product_promotions.id', 'desc')
        ->first();
    }
}
