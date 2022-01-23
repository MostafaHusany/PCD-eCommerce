<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = ['title', 'description', 'cost', 'cost_type', 'free_on_cost_above', 'meta'];
}
