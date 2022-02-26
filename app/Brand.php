<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['ar_title', 'en_title', 'ar_description',
    'en_description', 'image'];
}
