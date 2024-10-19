<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'address',
        'tax_file_number',
        'employee_size_id',
        'street_number',
        'country_id',
        'city_id',
        'post_code',
        'shop_category_id',
        'delivery_charge', 
        'delivery_time',
        'phone',
        'email',
        'logo',
        'banner',
        'color',
        'font',
        'location_id'
    ];

    public function items()
    {
        return $this->hasMany('App\Models\MenuItem', 'shop_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\ShopCategory', 'shop_category_id');
    }

    public function item_categories()
    {
        return $this->hasMany('App\Models\ItemCategory', 'shop_id');
    }

    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'location_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'shop_id');
    }
}
