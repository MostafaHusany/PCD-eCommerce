<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VCustomerPhone extends Model
{
    protected $fillable = ['phone', 'code', 'user_id'];

    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }
}
