<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RUProductCategory extends Model
{
    protected $fillable = ['category_id', 'm_product_id', 'product_id', 'is_default', 'upgrade_price', 'needed_quantity'];

}
