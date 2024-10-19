<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'shop_id',
        'rider_id',
        'address_type',
        'location_id',
        'address_id',
        'delivery_time_type',
        'schedule_id',
        'promo_code_id',
        'payment_type',
        'payment_card_id',
        'sub_total',
        'delivery_charge',
        'tax',
        'total',
        'status_id'
    ];

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop', 'shop_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function items()
    {
        return $this->hasMany('App\Models\OrderItem', 'order_id');    
    }

    public function status()
    {
        return $this->belongsTo('App\Models\OrderStatus', 'status_id');
    }

    public function rider()
    {
        return $this->belongsTo('App\Models\User', 'rider_id');
    }
}
