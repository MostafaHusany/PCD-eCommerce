<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * status :
     * -1 مرتجع
     */
    protected $fillable = ['status', 'note', 'meta', 'sub_total', 'total', 'customer_id',
    'code', 'shipping_cost', 'is_free_shipping', 'shipping_id', 'taxe', 'fee', 'address_id',
    'promo_code_id', 'promo_code_discount'];

    public function customer () {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function order_products () {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }

    public function products () {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id')->withPivot('price_when_order');
    }

    public function shipping () {
        return $this->belongsTo(Shipping::class, 'shipping_id');
    }

    public function invoice () {
        return $this->hasOne(Invoice::class, 'order_id');
    }
    
    public function payment_status () {
        return isset($this->invoice) ? $this->invoice->status : '---';
    }

    public function promo_code () {
        return $this->belongsTo(PromoCode::class, 'promo_code_id');
    }

    public function status_obj () {
        return $this->belongsTo(OrderStatus::class, 'status', 'status_code');
    }
}
