<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    protected $fillable = ['code', 'type', 'value', 'user_id'];

    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orders () {
        return $this->hasMany(Order::class, 'promo_code_id');
    }
}
