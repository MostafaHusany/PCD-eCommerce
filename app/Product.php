<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['ar_name', 'ar_small_description', 'ar_description',
                            'en_name', 'en_small_description', 'en_description',
                            'quantity', 'price_after_sale', 'price', 'sku', 'slug',
                            'main_image', 'images', 'meta', 'category_id'];

    public function getFormatedPrice () {
        return $this->price . ' SR';
    }
    
    public function getFormatedSale () {
        return $this->price . ' SR';
    }

    public function categories () {
        return $this->belongsToMany(ProductCategory::class, 'r_category_products', 'product_id', 'category_id');
    }
}
