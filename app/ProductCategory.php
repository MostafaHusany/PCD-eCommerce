<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = ['ar_title', 'en_title', 'ar_description', 'en_description',
     'rule', 'is_main', 'category_id', 'slug', 'icon', 'is_nav', 'is_active'];

    public function parent () {
        return $this->hasOne(ProductCategory::class, 'category_id');
    }

    public function categoryParent () {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function children () {
        return $this->hasMany(ProductCategory::class, 'category_id');
    }

    public function products () {
        return $this->belongsToMany(Product::class, 'r_category_products', 'category_id', 'product_id');
    }

    public function attributes () {
        return $this->hasMany(CategoryAttribute::class, 'category_id');
    }

    public function product_custome_fields () {
        return $this->hasMany(ProductCustomeField::class, 'category_id');
    }

    public function brands () {
        return $this->belongsToMany(Brand::class, 'category_brands', 'category_id', 'brand_id');
    }


    // start upgrade option 
    /**
     * Didn't make relation because didn't need it here.
     */
}
