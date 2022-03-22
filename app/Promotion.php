<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = ['title', 'start_date', 'end_date', 'is_active', 'meta'];

    public function products () {
        return $this->belongsToMany(Product::class, 'product_promotions', 'promotion_id', 'product_id')->withPivot(['start_date', 'end_date', 'quantity', 'is_active']);
    }
}
