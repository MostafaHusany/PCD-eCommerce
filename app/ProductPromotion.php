<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPromotion extends Model
{
    protected $fillable = ['product_id', 'promotion_id', 'start_date', 'end_date', 'quantity', 'is_active'];

    public function product () {
        $this->belongsTo(Product::class, 'product_id');
    }

    public function promotion () {
        $this->belongsTo(Promotion::class, 'promotion_id');
    }
}
