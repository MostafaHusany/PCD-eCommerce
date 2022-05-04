<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryBrand extends Model
{
    // A many 2 many pivot table ...
    protected $fillable = ['category_id', 'brand_id'];
}
