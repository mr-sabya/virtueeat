<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sunday',
        'monday',
        'tuesday',
        'wednesday',
        'thursday',
        'friday',
        'saturday'
    ];

    protected $casts = [
        'sunday' => 'array',
        'monday' => 'array',
        'tuesday' => 'array',
        'wednesday' => 'array',
        'thursday' => 'array',
        'friday' => 'array',
        'saturday' => 'array'
    ];

    public function schedule()
    {
        return $this->belongsTo(Shop::class);
    }
}
