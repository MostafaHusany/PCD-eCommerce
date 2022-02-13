<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCustomeField extends Model
{
    protected $fillable = ['title', 'value', 'type', 'product_id', 'category_id', 'category_attribute_id'];

    public function product () {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function product_category () {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function category_attr () {
        return $this->belongsTo(CategoryAttribute::class, 'category_attribute_id');
    }
}
