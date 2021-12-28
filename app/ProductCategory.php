<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = ['ar-title', 'en-title', 'ar-description', 'en-description', 'rule'];
}
