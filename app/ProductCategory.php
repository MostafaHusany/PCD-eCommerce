<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = ['ar_title', 'en_title', 'ar_description', 'en_description', 'rule', 'is_main', 'category_id'];

    public function parent () {
        return $this->hasOne(ProductCategory::class, 'category_id');
    }

    public function children () {
        return $this->hasMany(ProductCategory::class, 'category_id');
    }

    public function products () {
        return $this->belongsToMany(Product::class, 'r_category_products', 'category_id', 'product_id');
    }
}
