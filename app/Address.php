<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'city',
        'state',
        'address',
        'address_details',
        'customer_id',
        'zipcode'
    ];
}
