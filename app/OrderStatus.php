<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $fillable = ['status_code', 'status_name', 'color'];

    static public function get_status () {
        return cache()->remember('order_status', CACHE_TIME, function () {
            return OrderStatus::all();
        });
    }

    public function orders () {
        return $this->hasMany(Order::class, 'status_code', 'status');
    }
}
