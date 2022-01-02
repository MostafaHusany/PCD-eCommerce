<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompositeProductProduct extends Model
{
    protected $fillable = ['composite_product_id', 'product_id'];
}
