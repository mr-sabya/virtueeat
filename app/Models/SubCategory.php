<?php

namespace App\Models;

use App\Traits\GenerateUniqueSlugTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory, GenerateUniqueSlugTrait;

    protected $fillable = ['category_id', 'name', 'slug', 'thumbnail'];
}
