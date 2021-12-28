<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'first_name', 'second_name', 'name', 'email',
        'phone', 'address', 'city', 'plain_password',
        'user_id', 'meta'
    ];

    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFullName () {
        return $this->first_name . ' ' . $this->second_name;
    } 
}
