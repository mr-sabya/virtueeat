<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop2OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'color_id',
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Shop2Product', 'product_id');    
    }
    public function color()
    {
        return $this->belongsTo('App\Models\Shop2ProductColor', 'color_id');    
    }
}
