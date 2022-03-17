<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = ['sub_total', 'fee', 'tax', 'shipping',
                        'total', 'order_id', 'status', 'trasnaction_imge',
                        'payment_refuse_count'
                    ];

    /**
     * # status values
     * 1- waiting_payment
     * 2- check_payment_transaction
     * 3- paid
     * 4- refused
     */
    public function order () {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
