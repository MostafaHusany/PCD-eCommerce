<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $fillable = ['is_main', 'status_code', 'status_name_en', 'status_name_ar', 'color'];

    static public function get_status () {
        return cache()->remember('order_status', CACHE_TIME, function () {
            return OrderStatus::where('is_main', 0)->get();
        });
    }

    public function orders () {
        return $this->hasMany(Order::class, 'status_code', 'status');
    }
}
