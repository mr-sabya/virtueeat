<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'shop_id', 'category_id', 'dietary_id', 'name', 'price', 'thumbnail', 'description', 'delivery_time'];

    public function itemcategories()
    {
        return $this->belongsToMany('App\Models\ItemCategory');
    }


    public function getItemCategory($id)
    {
        $category = $this->itemcategories()->where('item_category_id', $id)->first();
        
        if($category){
            return true;
        }else{
            return false;
        }
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');    
    }

    public function shop()
    {
        return $this->belongsTo('App\Models\Shop', 'shop_id');
    }
}
