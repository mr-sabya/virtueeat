<?php

namespace App\Models;

use App\Traits\GenerateUniqueSlugTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop2Category extends Model
{
    use HasFactory, GenerateUniqueSlugTrait;
    protected $fillable = ['name', 'slug'];
}
