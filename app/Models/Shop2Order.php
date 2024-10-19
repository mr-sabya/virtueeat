<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop2Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'city',
        'address_line_1',
        'address_line_2',
        'zip_code',
        'card_holder_name',
        'card_month',
        'card_year',
        'cvv',
        'total_price', 
        'status'
    ];

    public function items()
    {
        return $this->hasMany('App\Models\Shop2OrderItem', 'order_id');
    }


    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');  
    }
}
