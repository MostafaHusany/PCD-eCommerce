<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{    
    protected $fillable = ['title', 'description', 'cost', 'cost_type', 'is_fixed', 'free_on_cost_above', 'meta'];

}
