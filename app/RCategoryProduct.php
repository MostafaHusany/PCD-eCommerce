<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RCategoryProduct extends Model
{
    protected $fillable = ['category_id', 'product_id'];
}
