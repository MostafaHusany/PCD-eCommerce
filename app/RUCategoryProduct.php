<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RUCategoryProduct extends Model
{
    protected $fillable = ['category_id', 'product_id'];
}
