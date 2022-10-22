<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FailedMessage extends Model
{
    private $fillable = ['phone', 'message', 'err_code', 'err_msg'];
}
