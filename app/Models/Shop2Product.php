<?php

namespace App\Models;

use App\Traits\GenerateUniqueSlugTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop2Product extends Model
{
    use HasFactory, GenerateUniqueSlugTrait;
    protected $fillable = ['name', 'slug', 'category_id', 'price', 'regular_price', 'off',  'description', 'image', 'image_alt'];


    public function colors()
    {
        return $this->belongsToMany('App\Models\Shop2ProductColor');    
    }

    public function images()
    {
        return $this->hasMany('App\Models\Shop2ProductImage', 'product_id');    
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Shop2Category', 'category_id');    
    }

    public function getColor($id)
    {
        $color = $this->colors()->where('id', $id)->first();
        
        if($color){
            return true;
        }else{
            return false;
        }
    }
}
