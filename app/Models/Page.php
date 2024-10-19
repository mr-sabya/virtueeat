<?php

namespace App\Models;

use App\Enums\PageType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_type',
        'name',
        'content'
    ];

        /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'page_type' => PageType::class,
    ];
}
