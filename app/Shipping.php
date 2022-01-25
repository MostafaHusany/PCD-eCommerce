<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = ['title', 'description', 'cost', 'cost_type', 'is_fixed', 'free_on_cost_above', 'meta'];

    public function orders () {
        return $this->hasMany(Order::class, 'shipping_id');
    }
}
