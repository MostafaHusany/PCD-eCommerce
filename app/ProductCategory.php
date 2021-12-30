<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = ['ar-title', 'en-title', 'ar-description', 'en-description', 'rule', 'is_main', 'category_id'];

    public function parent () {
        return $this->hasOne(ProductCategory::class, 'category_id');
    }

    public function children () {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function products () {
        return $this->belongsToMany(ProductCategory::class, 'r_category_products', 'category_id', 'product_id');
    }
}
