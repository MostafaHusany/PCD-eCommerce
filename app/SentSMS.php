<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SentSMS extends Model
{
    protected $fillable = ['phone', 'message', 'status', 'err_code', 'err_msg'];
}
