<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $fillable = ['title', 'description', 'cost', 'free_on_cost_above', 'meta',
                            // 'cost_type', 'is_fixed',
                            'is_free_taxes'
                        ];

    public function orders () {
        return $this->hasMany(Order::class, 'shipping_id');
    }
}
