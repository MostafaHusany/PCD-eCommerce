<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['ar_name', 'ar_small_description', 'ar_description',
                            'en_name', 'en_small_description', 'en_description',
                            'quantity', 'reserved_quantity', 'price_after_sale', 'price', 'sku', 'slug',
                            'main_image', 'images', 'meta', 'category_id',
                            'is_active', 'is_composite', 'brand_id', 'storage_quantity'];

    
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
        $instance = $this->hasMany(ProductPromotion::class, 'product_id');
        $instance->getQuery()
        ->where('product_promotions.start_date', '<=', Date('Y-m-d'))
        ->where('product_promotions.end_date', '>=', Date('Y-m-d'))
        ->where('product_promotions.is_active', 1)
        ->where('product_promotions.quantity', '>', 0)
        ->orderBy('product_promotions.id', 'desc')
        ->limit(1);

        return $instance;
    }

    public function has_promotion () {
        // check if the product has an active promotion
        return $this->product_promotion_r()
        ->where('product_promotions.start_date', '<=', Date('Y-m-d'))
        ->where('product_promotions.end_date', '>=', Date('Y-m-d'))
        ->where('product_promotions.is_active', 1)
        ->where('product_promotions.quantity', '>', 0)
        ->orderBy('product_promotions.id', 'desc')
        ->count();
    }

    public function get_promotion () {
        // get lates promotion of the product
        return $this->product_promotion_r()
        ->where('product_promotions.start_date', '<=', Date('Y-m-d'))
        ->where('product_promotions.end_date', '>=', Date('Y-m-d'))
        ->where('product_promotions.is_active', 1)
        ->where('product_promotions.quantity', '>', 0)
        ->orderBy('product_promotions.id', 'desc')
        ->first();
    }

    public function get_price () {
        /** 
         * # Here where we can get the product price
         * we will check if there is a promotion and get the promotion price
         * */
        if ($this->has_promotion()) {
            $target_promotion = $this->get_promotion();
            return $target_promotion->price;
        }

        return $this->price;
    }

    public function get_quantity () {
        /** 
         * # Here where we can get the product quantity
         * we will check if there is a promotion and get the promotion quantity
         * */
        if ($this->has_promotion()) {
            $target_promotion = $this->get_promotion();
            return $target_promotion->quantity;
        }

        return $this->quantity;
    }

    public function update_promotion ($quantity) {
        /**  
         * # Here we will update the promotion value,
         * if the product have a promotion we need to do some update
         * decrease the valid quantity for the promotion link an order with a promotion
         *  
         * we want to make the operation once and for all
         * get the targted promotion id, and selected quantity
         * update the promotion and tell it that we toke this quantity
         * 
         * */

        if ($this->has_promotion()) {
            $product_promotion = $this->get_promotion();
            $product_promotion->quantity -= $quantity;
            $product_promotion->save();

            // update promotion meta 
            $promotion     = $product_promotion->promotion;
            $meta          = (array) json_decode($promotion->meta);
            $products_meta = (array) $meta['products_meta'];
            $products_meta[$product_promotion->product_id]->quantity = $products_meta[$product_promotion->product_id]->quantity - $quantity;
            // dd($meta, $products_meta);


            // save meta of promotion
            $meta['products_meta'] = $products_meta;
            $promotion->meta = json_encode($meta);
            $promotion->save();

            return 1;
        }

        return 0;
    }


    // start upgrade relation
    public function upgrade_categories () {
        return $this->belongsToMany(ProductCategory::class, 'r_u_category_products', 'product_id', 'category_id');
    }

    public function upgrade_products () {
        return $this->belongsToMany(Product::class, 'r_u_product_categories', 'm_product_id', 'product_id')->withPivot('category_id', 'is_default', 'upgrade_price', 'needed_quantity');
    }

}
