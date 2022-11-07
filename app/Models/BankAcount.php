<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAcount extends Model
{
    use HasFactory;

    protected $fillable = ['bank_name', 'account_name', 'number', 'iban', 'is_active', 'image'];
}
