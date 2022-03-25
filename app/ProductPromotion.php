<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPromotion extends Model
{
    protected $fillable = ['product_id', 'promotion_id', 
    'start_date', 'end_date', 
    'old_price', 'price', 
    'discount_ratio', 'quantity', 'is_active'];

    public function product () {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function promotion () {
        return $this->belongsTo(Promotion::class, 'promotion_id');
    }
}
