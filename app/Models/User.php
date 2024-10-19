<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\UserType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    # Check of merchant role
    public function isMerchant() {
        if($this->user_type == UserType::MERCHANT){
            return true;
        }
        return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'is_email_verified',
        'otp',
        'is_phone_verified',
        'image',
        'address',
        'country_id',
        'city_id',
        'vehicle_type',
        'location_id',
        'user_type',
        'shop_id',
        'is_active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'user_type' => UserType::class,
    ];


    public function businessAccount()
    {
        return $this->belongsTo('App\Models\Shop', 'shop_id');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'location_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'user_id');
    }
    
    public function riderorders()
    {
        return $this->hasMany('App\Models\Order', 'rider_id');
    }
}
