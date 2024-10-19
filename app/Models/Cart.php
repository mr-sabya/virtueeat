<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop', 'shop_id');
    }

    public function items()
    {
        return $this->hasMany('App\Models\CartItem', 'cart_id');
    }
}
