<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $fillable = ['status_code', 'status_name_ar', 'status_name_en', 'color'];

    static public function get_status () {
        // return cache()->remember('order_status', CACHE_TIME, function () {
        //     return OrderStatus::all();
        // });
        return OrderStatus::all();
    }

    public function orders () {
        return $this->hasMany(Order::class, 'status', 'status_code');
    }
}
