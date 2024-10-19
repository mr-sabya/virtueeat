<?php

namespace App\Models;

use App\Enums\VehicleType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vehicle_type',
        'documents',
        'thumbnail'
    ];

    protected $casts = [
        'documents' => 'array',
        'vehicle_type' => VehicleType::class,
    ];
}
