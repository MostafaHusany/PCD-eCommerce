<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    // Type :: country, & gove only for the start

    protected $fillable = ['flag', 'is_active', 'name', 'type', 'district_id', 'phone_code'];
    
    public function parent_district () {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function children_districts () {
        return $this->hasMany(District::class, 'district_id');
    }

    public function orders_by_country () {
        return $this->hasMany(Order::class, 'country_id');
    }
    
    public function orders_by_gove () {
        return $this->hasMany(Order::class, 'gove_id');
    }

    public function customers_of_country () {
        return $this->hasMany(Customer::class, 'country_id');
    }

    public function customers_of_gover () {
        return $this->hasMany(Customer::class, 'gove_id');
    }
}
