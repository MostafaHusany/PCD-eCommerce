<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThemeSetting extends Model
{
    protected $fillable = ['section', 'meta', 'category_id'];

    public function category () {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
