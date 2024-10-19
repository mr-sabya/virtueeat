<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop2ProductImage extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'name', 'image', 'image_alt'];
}
