<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxe extends Model
{
    // cost_type => 0 package, 1 per item
    // is_fixed  =>  0 percentage, 1 fixed
    protected $fillable = ['title', 'description', 'cost', 'cost_type', 'is_fixed'];
}
