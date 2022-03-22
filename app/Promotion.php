<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = ['title', 'start_date', 'end_date', 'is_active', 'meta'];

    public function products () {
        $this->belongsToMnay(Product::class, 'product_promotions', 'promotion_id', 'product_id')->withPivot(['start_date', 'end_date', 'quantity', 'is_active']);
    }
}
