<?php

namespace App;


use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laratrust\Traits\LaratrustUserTrait;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use LaratrustUserTrait; // add this trait to your user model

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'password', 'category', 'picture', 'meta'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function customer () {
        return $this->hasOne(Customer::class, 'user_id');
    }

    public function addresses(){
        return $this->hasMany(Address::class);
    }

    public function orders(){
        return $this->hasMany(Order::class,'customer_id')->orderBy('id','desc');
    }

    public function promo_cods () {
        return $this->hasMany(PromoCode::class, 'user_id');
    }
}
