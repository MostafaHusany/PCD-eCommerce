<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'email',
        'phone', 'address', 'city', 'plain_password',
        'user_id', 'meta', 'gove_id', 'country_id', 'phone_code'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function scopeFullName()
    // {
    //     return $this->first_name . ' ' . $this->second_name;
    // }

    public function country ()
    {
        return $this->belongsTo(District::class, 'country_id');
    }

    public function government ()
    {
        return $this->belongsTo(District::class, 'gove_id');
    }

    public function orders ()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }

    public function addresses ()
    {
        return $this->hasMany(Address::class ,'customer_id');
    }
}
