<?php

namespace App\Models;

use App\Traits\GenerateUniqueSlugTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory, GenerateUniqueSlugTrait;

    protected $fillable = ['name', 'slug', 'thumbnail'];


    public function foodItems()
    {
        return $this->hasMany('App\Models\MenuItem', 'category_id');    
    }
}
