<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'country_id', 'city_id', 'category_id', 'name', 'details', 'location'
    ];

    protected $casts = [
        'name' => 'array',
        'details' => 'array'
    ];
}
