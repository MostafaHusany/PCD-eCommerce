<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Taxe;

class Shipping extends Model
{
    protected $fillable = ['title', 'description', 'cost', 'free_on_cost_above', 'meta',
                            // 'cost_type', 'is_fixed',
                            'is_free_taxes'
                        ];

    public function orders () {
        return $this->hasMany(Order::class, 'shipping_id');
    }

    public function getCost () {
        /**
         * Check if the shipping is not free tax
         * get all active taxes and calculate taxes for the shipping
         * return total cost with taxe if exist
         */

        // dd($this);
        if ($this->is_free_taxes) {
            return $this->cost;
        }

        $all_taxes = Taxe::where('is_active', 1)->get();

        $total_tax = 0;
        foreach ($all_taxes as $tax) {
            $total_tax += $this->cost * $tax->cost / 100;
        }
        
        return $total_tax + $this->cost;
    }
}
