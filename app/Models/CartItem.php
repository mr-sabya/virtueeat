<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    public function menuItem()
    {
        return $this->belongsTo('App\Models\MenuItem', 'menu_item_id');
    }
}
