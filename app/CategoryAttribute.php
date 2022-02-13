<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryAttribute extends Model
{
    protected $fillable = ['title', 'type', 'meta', 'category_id'];

    public function products_categories () {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function product_custome_fields () {
        return $this->hasMany(ProductCustomeField::class, 'category_attribute_id');
    }
}
