<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryAttribute extends Model
{
    protected $fillable = ['title', 'type', 'meta', 'category_id'];

    public function products_categories () {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
