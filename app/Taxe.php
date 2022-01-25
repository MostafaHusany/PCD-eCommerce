<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxe extends Model
{
    protected $fillable = ['title', 'description', 'cost', 'cost_type', 'is_fixed'];
}
