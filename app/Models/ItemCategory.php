<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    use HasFactory;

    protected $fillable = ['shop_id', 'name', 'icon'];


    public function menuItems()
    {
        return $this->belongsToMany('App\Models\MenuItem');
    }
}
